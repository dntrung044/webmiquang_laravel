<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        elseif (Auth::user()->name->active != 1) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tài khoản của bạn chưa được kích hoạt hoặc đã khóa!');
        }
    }
}
