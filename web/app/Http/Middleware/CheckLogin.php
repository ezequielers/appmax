<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('_user_')) {
            return redirect()->route('admin.auth.login');
        }

        return $next($request);
    }
}
