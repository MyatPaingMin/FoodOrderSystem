<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ViewProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userHome(){
        // $pizzas = Product::orderBy('created_at','desc')->get();
        // $category = Category::get();
        // return view('user/Main/home',compact(['pizzas','category']));

// YOU HAVE TO USE GET METHOD FROM FORM
        // if(ViewProduct::where('user_id',Auth::user()['id'])->get()->count() > 0){
        //     $pizzas = Product::select('products.name','products.id as product_id','products.image','products.price','view_products.*')
        //         ->when(request('filterCategory'),function($query){
        //             $query -> where('category_id',request('filterCategory'));
        //         })
        //         ->leftJoin('view_products','view_products.product_id','products.id')
        //         ->orderBy('created_at','desc')
        //         ->get();
        //         // ->get()->toArray();
        //         // dd($pizzas);
        //     $category = Category::get();
        //     return view('user/Main/home',compact(['pizzas','category']));
        // }else{
            $pizzas = Product::when(request('filterCategory'),function($query){
                    $query -> where('category_id',request('filterCategory'));
                })
                ->orderBy('created_at','desc')
                ->get();
            $category = Category::get();
            return view('user/Main/home',compact(['pizzas','category']));
        // }
    }

    public function filterCat($id){
        $pizzas = Product::where('category_id',$id)->orderBy('created_at','desc')->get();
        $category = Category::get();
        return view('user/Main/home',compact(['pizzas','category']));
    }

    public function pizzaDetail($id){
        $pizza = Product::select('products.*','categories.name as category_name')
            ->where('products.id',$id)
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->first()->toArray();
        $otherpizza = Product::select('products.*','categories.name as category_name')
            ->where('products.id','<>',$id)
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->orderBy('created_at','desc')
            ->get()->toArray();
        return view('user/Main/detail',compact(['pizza','otherpizza']));
    }

    public function profile(){
        $user = User::where('id',Auth::user()['id'])->first();
        return view('user/account/profile',compact('user'));
    }

    public function passwordChange(){
        $user = User::select('id','password')->where('id',Auth::user()['id'])->first();
        return view('user/account/changePassword',compact('user'));
    }

    public function editUserProfile(){
        $user = User::where('id',Auth::user()['id'])->first();
        // dd($user);
        return view('user/account/editprofile',compact('user'));
    }

    public function updateUser(Request $req){
        $this->validateFunction($req);
        $datapack = $this->dataCollection($req);
        if($req->hasFile('profile_photo_path')){
            $oldPhoto = User::where('id',Auth::user()['id'])->first()->profile_photo_path;
            $photoName = uniqid().$req->file('profile_photo_path')->getClientOriginalName();
            if(Auth::user()['profile_photo_path'] != NULL){
                Storage::delete('public/user'.$oldPhoto);
            }
            $req->file('profile_photo_path')->storeAs('public/user',$photoName);
            $datapack['profile_photo_path'] = $photoName;
        }else{
            $oldPhoto = User::where('id',Auth::user()['id']);
            $datapack['profile_photo_path'] = $oldPhoto;
        }
        User::where('id',Auth::user()['id'])->update($datapack);
        return redirect()->route('userHome')->with(['updateUser'=>'User Information updated successfully.']);
    }

    private function validateFunction($req){
        $validateElement = [
            'username' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_photo_path' => 'mimes:pdf,png,jpeg,jpg,webp'
        ];
        $validateMsg = [
            'username.required' => 'User name must be filled in.',
            'email.required' => 'Email must be filled in.',
            'gender.required' => 'Gender must be filled in.',
            'phone.required' => 'Phone must be filled in.',
            'address.required' => 'Address must be filled in.',
            'profile_photo_path.mimes' => 'The photo is not in the right format'
        ];
        Validator::make($req->all(),$validateElement,$validateMsg)->validate();
    }

    private function dataCollection($req){
        // dd($req->all());
        $datapack = [
            'user_name' => $req->username ,
            'email' => $req->email,
            'gender' => $req->gender,
            'phone' => $req->phone,
            'address' => $req->address
        ];

        return $datapack;
    }

    public function passwordUpdate(Request $req){
        // dd($req->all());
        $this->validPass($req);

        if(Hash::check($req->oldpassword,Auth::user()['password'])){
            if(!Hash::check($req->newpassword,Auth::user()['password'])){
                $datapack = $this->passCollection($req);
                User::where('id',Auth::user()['id'])->update($datapack);
            }else{
                return redirect()->route('changePassword')->with(['passSame' => 'Password same.']);
            }
        }else{
            return redirect()->route('changePassword')->with(['passWrong' => 'Password wrong.']);
        }

        return redirect()->route('userHome')->with(['passChange' => 'Password changed successfully.']);
    }

    public function historyPage(){
        $orders = Order::where('user_id',Auth::user()['id'])->orderBy('created_at','DESC')->paginate(5);
        return view('user/Main/history',compact('orders'));
    }

    public function saveCart(Request $req){
        Cart::where('user_id',Auth::user()['id'])->delete();
        foreach($req->all() as $item){
            Cart::create($item);
        };
        return 'success';
    }

    private function validPass($req){
        $validateElement = [
            'newpassword' => 'required|min:8',
            'oldpassword' => 'required|min:8',
            'confirmpassword' => 'requried|same:newpassword'
        ];
        $validateMsg = [
            'newpassword.required' => 'Please fill in new password.',
            'newpassword.min' => 'The password must be at least 8 characters long.',
            'oldpassword.required' => 'Please fill in old password.',
            'oldpassword.min' => 'The password must be at least 8 characters long.',
            'confirmpassword.same' => 'Two passwords do not match.',
            'confirmpassword.required' => 'Please confirm your password.'
        ];
        Validator::make($req->all(),$validateElement,$validateMsg)->validate();
    }
    private function passCollection($req){
        $datapack = [
            'password' => Hash::make($req->newpassword)
        ];
        return $datapack;
    }
}
