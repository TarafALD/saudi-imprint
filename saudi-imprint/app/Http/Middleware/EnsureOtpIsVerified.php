<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureOtpIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !session('otp_verified')) {
            return redirect()->route('otp.verify');
        }

        return $next($request);
    }
}
