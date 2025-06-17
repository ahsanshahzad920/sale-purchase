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
            // dd('redirectTo');
            // return route('login');
            $host = $request->getHost();
            $subdomain = explode('.', $host)[0]; // Get the subdomain from the host
            // return route('login', ['subdomain' => $subdomain]);
            if($subdomain){
                return route('login', ['subdomain' => $subdomain]); // Redirect to the login route with the subdomain
            }
            else{
                return route('auth.login'); // Redirect to the login route without subdomain
            }
            
        }
    }
}
