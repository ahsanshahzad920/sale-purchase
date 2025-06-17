<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, $next)
    {
        $subdomain = $request->route('subdomain');
        
        // Check if tenant exists in database
        $tenant = \App\Models\Tenant::where('subdomain', $subdomain)->first();
        
        if (!$tenant) {
            return redirect('/')->with('error', 'Invalid subdomain');
        }
        
        // Make tenant available throughout the app
        app()->instance('currentTenant', $tenant);
        
        return $next($request);
    }
}
