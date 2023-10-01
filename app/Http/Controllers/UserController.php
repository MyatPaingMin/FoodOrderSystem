<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginPage(){
        return view('login');
    }
    public function registerPage(){
        return view('register');
    }
    public function logoutUser(){
        auth()->logout();
        return redirect()->route('loginPage');
    }
    public function registerAdmin(Request $req){
        // $this->validationChecking($req);
        // dd($req->all());

        $user = User::create([
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role' => 'admin'
        ]);

        $admin = Admin::create([
            'user_id' => $user->id,
            'admin_name' => $req->username,
            'gender' => $req->gender,
            'phone' => $req->phone,
            'address' => $req->address,
            'status' => 0
        ]);
        $currentUser = User::where('id','=',$user->id)->first();
        // dd($currentUser);
        Auth::login($currentUser,$remember = true);
        // if(Auth::attempt(['email' => $req->email, 'password' => $req->password], true)){
        //     dd('successful');
        return redirect()->intended(RouteServiceProvider::HOME);
        // }else{
        //     dd('fail');
        // };
    }

    public function registerCustomer(Request $req){

    }

    public function registerResturant(Request $req){

    }

    public function registerDelivaryman(Request $req){

    }

    private function validationChecking($data){
        $validateData = [
            'username' => 'required|unique:admins,admin_name|unique:customers,customer_name|unique:delivaries,delivaryman_name|unique:resturants,resturant_name',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ];
        $validateMsg = [
            'username.required' => 'Please fill in the name field.',
            'username.unique' => 'User with this name exists.',
            'email.required' => 'Please fill in the email field.',
            'email.unique' => 'This email exists.',
            'gender.required' => 'Please fill in the gender field.',
            'phone.required' => 'Please fill in the phone field.',
            'password.required' => 'Please fill in the password field.',
            'passwordConfirm.required' => 'Please fill in the password confirm field.',
            'passwordConfirm.same' => 'Please fill in the password field.',
        ];
        Validator::make($data->all(),$validateData,$validateMsg)->validate();
    }

    public function loginUser(Request $req){
        $this->validatinglogin($req);
        $credentials = ['email' => $req->email, 'password' => $req->password];
        $remember = $req->remember;
        if(auth()->attempt($credentials,$remember)){
            // dd('Userlogin' . Auth::user());
            $this->condition();
        }else{
            return redirect()->back();
        };
    }
    private function validatinglogin($data){
        $validatingData = ['email' => 'required', 'password' => 'required'];
        $validatingMsg = ['email.required' => 'Email field must be filled in.',
                        'password.required' => 'Password field must be filled in.'
                    ];
        Validator::make($data->all(),$validatingData,$validatingMsg)->validate();
    }

    public function condition(){
        if(Auth::user()['role'] == 'admin'){
            // dd(Auth::user()->toArray());
            return redirect()->route('adminHome');
        }else if(Auth::user()['role'] == 'customer'){
            return redirect()->route('customerHome');
        }else if(Auth::user()['role'] == 'resturant'){
            return redirect()->route('resturantHome');
        }else if(Auth::user()['role'] == 'delivary'){
            return redirect()->route('delivaryHome');
        }
    }

    public function changepasswordPage(){
        $user = User::select('name')->where('id',Auth::user()->id);
        return view('admin.account.change',compact('user'));
    }
    public function changepassword(Request $req){
        $this->validpassword($req);
        if(Hash::check(Auth::user()['password'],$req->password)){
            User::where('id',Auth::user()['id'])
                ->update([
                    'name' => Auth::user()['name'],
                    'oldpassword' => $data->oldpassword,
                    'newpassword' => $data->newpassword,
                    'confirmpassword' => $data->confirmpassword
                ]);
        }else{
            return redirect()->back()->with(['wrong_password'=>'Wrong password']);
        }

    }
    private function validpassword($data){
        $validData = [
            'name' => 'same:'.Auth::user()['name'],
            'oldpassword' => 'required',
            'newpassword' => 'required|same:oldpassword',
        ];
        $validMsg = [
            'name.required' => 'Name field cannot be blank.',
            'oldpassword.required' => 'Old password cannot be blank.',
            'confirmpassword.required' => 'Confirm password cannot be blank.',
            'confirmpassword.same' => 'Two passwords does not match.'
        ];
        Validator::make($data->all(),$validData,$validMsg)->validate();
    }

}
