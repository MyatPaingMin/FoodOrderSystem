<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function adminDashboard(){
        return view('admin.dashboard');
    }
    //PROFILE START
    public function profile(){
        return view('admin.account.profile');
    }
    public function adminlist(){
        // $list = User::where('role','admin')
        //         ->when(request('search'),function($query){
        //             $query -> where('user_name','like','%'.request('search').'%')
        //                    -> orWhere('email','like','%'.request('search').'%');
        //         })

                // SELECT * FROM tblUser
                // WHERE `role` = 'admin'
                // AND (`user_name` like %request(key)%  OR `email` like %request(key)%)



                //condition1 AND (condition2 OR condition3)
        $list = User::where(function($query){
            $query->where('role','admin')//IMPORTANT
                  ->when(request('key'),function($query){
                    $query->where(function($query){
                        $query->where('user_name','like','%'.request('key').'%')
                            ->orWhere('email','like','%'.request('key').'%');
                    });
                });
            })

                ->paginate(5);
        // dd($list->toArray());
        return view('admin.list.adminlist',compact('list'));
    }

    public function deleteAdmin($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#list')->with(['deletedAdmin' => 'Admin deleted successfully.']);
    }

    public function roleChangePage($id){
        $user = User::where('id',$id)->first();
        // dd($user);
        return view('admin.list.roleChange',compact('user'));
    }

    public function roleChange(Request $req,$id){
        $roleUser = ['role' => $req->role];
        User::where('id',$id)->update($roleUser);
        return redirect()->route('admin#list')->with(['roleChangeAdmin' => 'Role has been changed']);
    }
    public function editProfile(){
        return view('admin.account.editprofile');
    }
    public function updateAdmin(Request $req){
        $id = Auth::user()->id;
        // dd($req->toArray());
        $this->validation($req,$id);
        if($req->role != 'admin'){
            abort(404);
        }
        // dd($req->toArray());

        // dd($req->hasFile('profile_photo_path'));
        $oldPhoto = Auth::user()['profile_photo_path'];
        $photoName = $oldPhoto;

        if($req->hasFile('profile_photo_path')){
            $photoName = uniqid().$req->file('profile_photo_path')->getClientOriginalName();
            Storage::delete('public/user/'.$oldPhoto);
            $req->file('profile_photo_path')->storeAs('public/user', $photoName);
        }

        $datapack = [
            'user_name' => $req->username,
            'email' => $req->email,
            'gender' => $req->gender,
            'phone' => $req->phone,
            'address' => $req->address,
            'profile_photo_path' => $photoName
        ];


        User::where('id',$id)->update($datapack);
        return redirect()->route('profile')->with(['updateProfile' => 'Saved changes.']);
        // return 'update';
    }

    public function userList(){
        $users = User::where('role','=','user')->paginate(5);
        return view('admin/list/userlist',compact('users'));
    }

    public function userRoleUp(Request $req){
        $userid = $req->userID;
        User::where('id',$userid)->update(['role'=>'admin']);
        $response = 'success';
        return response()->json($response,200);
    }
    public function userDelete(Request $req){
        User::where('id',$req->userID)->delete();
        $response = 'deleted';
        return response()->json($response,200);
    }

    public function detailUser($id){
        dd($id);
    }

    private function validation($data,$id){
        $validateItem = [
            //'username' => ['required',Rule::unique('users', 'user_name')->ignore($data->id)],
            'username' => 'required|unique:users,user_name,'.$id,
            'email' => ['required',Rule::unique('users', 'email')->ignore($id)],
            'gender'=> 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_photo_path' => ['mimes:jpg,jpeg,png,webp']
        ];

        $validationMsg = [
            'username.required' => 'Username must be entered',
            'username.unique' => 'Username must be unique',
            'email.required' => 'Email must be entered',
            'email.unique'=> 'Email must be unique',
            'address.required' => 'Address must be entered',
            'profile_photo_path.mimes'=>'Profile must be in right file format'
        ];

        Validator::make($data->all(),$validateItem,$validationMsg)->validate();
    }
    //PROFILE END

    //Password Changeing
    public function changepasswordPage(){
        return view('admin.password.change');
    }

    public function changepassword(Request $req){
        // dd('hoi');
        // dd($req->toArray());
        $this->passwordValidate($req);
        $user = Auth::user();
        // dd($user['password']);
        if(Hash::check($req->oldPassword,$user['password'])){

            $datapack = ['password' => Hash::make($req->newPassword)];

            if(!Hash::check($req->newPassword,$user['password'])){
                User::where('id',$user['id'])->update($datapack);

                //Logout for a while is suitable  <----------------------------------------
                // Auth::logout();
                // return redirect()->route('successPassChange');


                // return back()->with(['changedPass' => 'Password Changing successful.']);
                return redirect()->route('category_list')->with(['changedPass' => 'Password Changing successful.']);
            }else{
                return back()->with(['samePassword'=>'Use another password.']);
            }
        }else{
            return back()->with(['wrongPassword'=>'Old password is incorrect.']);
        }
    }
    private function passwordValidate($data){
        $validateItem = [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ];
        $validateMsg = [
            'oldPassword.required' => 'Please enter your original password.',
            'oldPassword.min' => 'Password has to be longer than 6 characters.',
            'newPassword.required' => 'Please enter your new password.',
            'newPassword.min' => 'Password has to be longer than 6 characters.',
            'confirmPassword.required' => 'Please confirm your password.',
            'confirmPassword.same' => 'Password confirmation does not match.'
        ];
        Validator::make($data->all(),$validateItem,$validateMsg)->validate();
    }

    public function successPassChange(){
        $message = 'Password changing successful.';
        return view('successPassChange',compact('message'));
    }
    //Password Changing End

}
