<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPlanLimitation
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
        $tenant = app('currentTenant');

        if ($tenant && $tenant->plan) {

            // // Check if the plan has limitations
            // if ($plan->max_users && $tenant->users()->count() >= $plan->max_users) {
            //     return response()->json(['error' => 'User limit reached for this plan.'], 403);
            // }

            // if ($plan->max_storage && $tenant->storageUsed() >= $plan->max_storage) {
            //     return response()->json(['error' => 'Storage limit reached for this plan.'], 403);
            // }
            if($request->routeIs('register') || $request->routeIs('customers.store') && $request->isMethod('post')){
                // dd('Register route accessed');
                $customerFeature  = $tenant->plan->features()->where('feature_name', 'Customers')->first();

                // if is not enabled
                if ($customerFeature && !$customerFeature->is_enabled) {
                    return redirect()->route('login')->with('error', 'Customer feature is not enabled for this plan.');
                }

                if ($customerFeature && $customerFeature->limit != -1 && $customerFeature->limit <= $tenant->customers()->count()) {
                    return abort(403, 'Customer limit reached for this plan.');
                }
            }
            if($request->routeIs('products.create')){
                $productFeature  = $tenant->plan->features()->where('feature_name', 'Products')->first();
                // if is not enabled
                if ($productFeature && !$productFeature->is_enabled) {
                    return redirect()->route('login')->with('error', 'Product feature is not enabled for this plan.');
                }
                if ($productFeature && $productFeature->limit != -1 && $productFeature->limit <= $tenant->products()->count()) {
                    return abort(403, 'Product limit reached for this plan.');
                }
            }
            if($request->routeIs('sales.create')){
                $saleFeature  = $tenant->plan->features()->where('feature_name', 'Orders')->first();
                // if is not enabled
                if ($saleFeature && !$saleFeature->is_enabled) {
                    return redirect()->route('login')->with('error', 'Order feature is not enabled for this plan.');
                }
                if ($saleFeature && $saleFeature->limit != -1 && $saleFeature->limit <= $tenant->sales()->count()) {
                    return abort(403, 'Sale limit reached for this plan.');
                }
            }
            // vendors
            if($request->routeIs('vendors.create') || $request->routeIs('vendors.store') && $request->isMethod('post')){
                $vendorFeature  = $tenant->plan->features()->where('feature_name', 'Vendors')->first();
                // if is not enabled
                if ($vendorFeature && !$vendorFeature->is_enabled) {
                    return redirect()->route('login')->with('error', 'Vendor feature is not enabled for this plan.');
                }
                if ($vendorFeature && $vendorFeature->limit != -1 && $vendorFeature->limit <= $tenant->vendors()->count()) {
                    return abort(403, 'Vendor limit reached for this plan.');
                }
            }
            // purchases
            if($request->routeIs('purchases.create')){
                $purchaseFeature  = $tenant->plan->features()->where('feature_name', 'Purchases')->first();
                // if is not enabled
                if ($purchaseFeature && !$purchaseFeature->is_enabled) {
                    return redirect()->route('login')->with('error', 'Purchase feature is not enabled for this plan.');
                }
                if ($purchaseFeature && $purchaseFeature->limit != -1 && $purchaseFeature->limit <= $tenant->purchases()->count()) {
                    return abort(403, 'Purchase limit reached for this plan.');
                }
            }
            // get online payment
            if(false){
                $onlinePaymentFeature  = $tenant->plan->features()->where('feature_name', 'Get Online Payment')->first();
                // if ($onlinePaymentFeature && $onlinePaymentFeature->limit != -1 && $onlinePaymentFeature->limit <= $tenant->onlinePayments()->count()) {
                    return abort(403, 'Online Payment limit reached for this plan.');
                // }
            }

            // Ecommerce
            if($request->routeIs('/') ||  $request->routeIs('shop') || $request->routeIs('add-to-cart.*') || $request->routeIs('about-us') ||  $request->routeIs('user.dashboard')){
                $landingPageFeature  = $tenant->plan->features()->where('feature_name', 'Ecommerce')->first();
                if ($landingPageFeature && !$landingPageFeature->is_enabled ) {
                    // return abort(403, 'Ecommerce feature is not enabled for this plan.');
                    return redirect()->route('login')->with('error', 'Ecommerce feature is not enabled for this plan.');
                }
            }


        }



        return $next($request);
    }
}
