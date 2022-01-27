<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
            return route('home');
        }
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     $isAuthenticatedAdmin = (Auth::check());

    //     //This will be excecuted if the new authentication fails.
    //     if (!$isAuthenticatedAdmin){

    //         return redirect()->route('home')->with('message', 'Authentication Error.');
    //     }
    //     return $next($request);

    // }
}
