<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }
    public function registerPage(){
        return view('register');
    }
    public function categoryList(){
        return view('admin.category_list');
    }
    public function customerHome(){
        return view('customer.home');
    }



    public function condition(){

        if(Auth::user()['role'] == 'admin'){
            // dd($user);
            return redirect()->route('category_list');
        }else if(Auth::user()['role'] == 'user'){
            // dd('done');
            return redirect()->route('userHome');
        }
    }
}
