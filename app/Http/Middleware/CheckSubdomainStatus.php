<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckSubdomainStatus
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
        // Get the subdomain from the request
        $subdomain = $request->route('subdomain');
        // Fetch the tenant by subdomain
        $tenant = app('currentTenant');
        // Check if the tenant exists and is active
        if (!$tenant || $tenant->status !== 'approved') {
            // Redirect to a 404 page or show an error message
            abort(404, 'Your subdomain is pending for approval.');
        }

        // check if the tenant having not plan
        // if ($tenant->plan_id == null) {
        //     // Redirect to a 404 page or show an error message
        //     // abort(404, 'Your subdomain not purchase any plan.');

        //     $host = request()->getHost(); // e.g., "admin.localhost"

        //     $mainDomain = explode('.', $host)[1];

        //     // Store the error message in the session
        //     session()->flash('error', 'Your subdomain has not purchased any plan.');
        //     Log::info('Session before redirect:', session()->all());


        //     return redirect('http://' . $mainDomain . '#pricing');
        // }

        // if(isset($tenant?->subscriptions->first()->end_date) && now()->greaterThan($tenant?->subscriptions->first()->end_date)){

        //     abort(403, 'Website subscription has been ended');
        // }

        if (isset($tenant?->trial_end_date) && now()->greaterThan($tenant?->trial_end_date) && !isset($tenant->plan_id)){
            abort(403, 'Website trial period has been ended. Please purchase a plan.');
        }

        $latestSubscription = $tenant->subscriptions()
            ->orderByDesc('end_date')
            ->first();

        if ($latestSubscription && now()->greaterThan($latestSubscription->end_date)) {
            abort(403, 'Website subscription has ended');
        }


        return $next($request);
    }
}
