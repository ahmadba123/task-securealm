<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomTokenAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/'); // Redirect to home page if user is not authenticated
        }

        $user = Auth::user();
        if (!$user->token) {
            // Add a debug statement to check if the user has a token
            dd('User does not have a token');
        }

        return $next($request);
        // return redirect('/about');

    }
}
