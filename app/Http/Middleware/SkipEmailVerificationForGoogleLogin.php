<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SkipEmailVerificationForGoogleLogin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasProvider('google')) {
            // Skip email verification for Google login
            return $next($request);
        }

        if (Auth::check() && Auth::user()->hasProvider('facebook')) {
            // Skip email verification for Google login
            return $next($request);
        }

        return redirect()->route('verification.notice'); // Redirect to verification page for other users
    }
}