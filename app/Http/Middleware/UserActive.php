<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         // Kiểm tra user login có được quyền vào dashboad không
         if ((auth()->user() && auth()->user()->is_active == '1' && auth()->user()->role == '1' )) {
            return $next($request);
        }

        return redirect()->route('home.login');
    }
}
