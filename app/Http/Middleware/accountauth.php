<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class accountauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
            // dd(url()->current(),route('authLoginPage'));

            if(url()->current() == route('authLoginPage') || url()->current() == route('authRegisterPage')){
                // dd('no access');
                // abort(404);
                if(Auth::user()['role'] == 'admin'){
                    return redirect()->route('category_list');
                }else{
                    return redirect()->route('userHome');
                }
                // return back(); // Back can be used for only one wrong route:: Redirect page can be used for many times.
            }
        }
        return $next($request);
    }
}
