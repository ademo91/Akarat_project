<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Check if user is authenticated
       if (auth()->check()) {
        return $next($request);  // Allow the request to proceed
        }

    // Redirect to login page if not authenticated
    return redirect()->route('login')->with('error', 'You need to log in to create a property.');

    }
}
