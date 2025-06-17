<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AppendSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        // $subdomain = $request->route('subdomain');
        // if ($subdomain) {
        //     $request->attributes->set('subdomain', $subdomain);
        //     // dd($request->attributes->get('subdomain'));
        // }

        // Get current subdomain from route
        $subdomain = $request->route('subdomain');

        $tenant = Tenant::where('subdomain', $subdomain)->first();
        if (!$tenant) {
            // return redirect('/')->with('error', 'Invalid subdomain');
            abort(404);
        }

        // Set default subdomain parameter for URL generation
        URL::defaults(['subdomain' => $subdomain]);

        // Share subdomain with all views
        view()->share('currentSubdomain', $subdomain);

        app()->instance('currentTenant', $tenant);

        return $next($request);
    }
}
