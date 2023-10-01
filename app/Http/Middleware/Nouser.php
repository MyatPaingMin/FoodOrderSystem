<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Nouser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->id){
            return $next($request);
        }else{
            if(Auth::user()->role == 'admin'){
                return redirect()->route('adminDashboard');
            }elseif(Auth::user()->role == 'customer'){
                dd('customer');
            }
        }
    }
}
