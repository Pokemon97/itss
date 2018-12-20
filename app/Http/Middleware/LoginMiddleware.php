<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->status == 1)
                return $next($request);
            else{
                Auth::logout();
                return redirect('dangnhap')->with('loi', 'Tài khoản đã bị khóa.');
            }
        }
        else
            return $next($request);

    }
}
