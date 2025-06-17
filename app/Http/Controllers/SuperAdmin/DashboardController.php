<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Plan;
use App\Models\Coupon;
use App\Models\Tenant;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Services\StripeService;
use App\Models\SubscriptionPayment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $stripeService;
    public function index()
    {
        // dd('Super Admin Dashboard');
        $customerCount = Tenant::count();
        $subscriptionCount = Subscription::count();
        $activeSubscriptionCount = Subscription::where('end_date', '>', now())->count();
        $totalIncome = SubscriptionPayment::sum('amount');
        $recentTransactions = SubscriptionPayment::latest()->take(5)->get();
        return view('super-admin.dashboard.dashboard', compact('customerCount', 'subscriptionCount', 'activeSubscriptionCount', 'totalIncome', 'recentTransactions'));
    }


    public function setting()
    {
        $setting = Setting::where('created_by', Auth::id())->first();
        // dd($setting);
        return view('super-admin.dashboard.settings.index', compact('setting'));
    }
    public function settingStore(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = "logo" . "_" . rand(1111, 9999) . '.' . $file->extension();
            $file->storeAs('public/images/logo/', $filename);
            $data['logo'] = "/images/logo/" . $filename;
        }
        // dd($data);
        $data['shopify_enable'] = $request->shopify_enable == 'on' ? 1 : 0;

        $setting = Setting::where('created_by', Auth::id())->first() ?? new Setting();
        $setting->fill($data)->save();

        return redirect()->back()->with('success', 'Setting Updated Successfully!');
    }

    public function contact()
    {

        $contacts = Contact::latest()->get();

        return view('super-admin.dashboard.contacts.index', compact('contacts'));
    }

    public function contactDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact Deleted Successfully');
    }



    // public function purchasePlan(Request $request, StripeService $stripeService)
    // {
    //     $request->validate([
    //         'plan_id' => 'required|exists:plans,id',
    //         // 'tenant_id' => 'required|exists:tenants,id',
    //         'coupon_code' => 'nullable|string',
    //     ]);

    //     // Check if the user is authenticated
    //     if(!auth()->user()){
    //         return redirect()->route('auth.login')->with('error','Please login first');
    //     }

    //     // Check if a coupon code is provided
    //     if ($request->filled('coupon_code')) {
    //         $coupon = Coupon::where('code', $request->coupon_code)->first();

    //         // Validate the coupon
    //         if ($coupon && $coupon->status === 'active' && $coupon->quantity > 0) {
    //             $discount = $coupon->discount;

    //             // Optionally, reduce the quantity of the coupon
    //             $coupon->quantity -= 1;
    //             $coupon->save();
    //         } else {
    //             return back()->withErrors(['coupon_code' => 'Invalid or expired coupon code.']);
    //         }
    //     }


    //     $tenant_id = auth()->user()?->tenant?->id;
    //     // dd($tenant_id);
    //     $request->merge(['tenant_id' => $tenant_id]);

    //     $this->stripeService = $stripeService;

    //     $plan = Plan::find($request->plan_id);

    //     $data = $request->all();
    //     $data['product_name'] =  $plan->title ?? 'Subscription Plan';
    //     $data['email'] = Auth::user()->email;

    //     $amount = $plan->price ?? '0';
    //     $currency = 'usd';

    //     // add request into session data
    //     session()->put('orderRequest', $request->all());

    //     $successUrl = route('upgrade-plan.success');
    //     $cancelUrl = route('upgrade-plan.cancel');

    //     try {
    //         // Create a checkout session and redirect
    //         $redirectUrl  = $this->stripeService->stripeCheckout($data, $successUrl, $cancelUrl, $currency, $amount);

    //         if ($redirectUrl) {
    //             return redirect($redirectUrl);
    //         } else {
    //             return redirect()->route('upgrade-plan.cancel')->with('error', 'Unable to initiate payment');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->route('upgrade-plan.success')->with(['error' => $e->getMessage()]);
    //     }
    // }

    public function purchasePlan(Request $request, StripeService $stripeService)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'coupon_code' => 'nullable|string',
        ]);

        // Check if the user is authenticated
        if (!auth()->user()) {
            return redirect()->route('auth.login')->with('error', 'Please login first');
        }

        // Initialize discount variable
        $discountPercentage = 0;

        // Check if a coupon code is provided
        if ($request->filled('coupon_code')) {
            $coupon = Coupon::where('code', $request->coupon_code)->first();

            // Validate the coupon
            if ($coupon && $coupon->plan_id == $request->plan_id && $coupon->status === 'active' && $coupon->quantity > 0) {
                $discountPercentage = $coupon->discount; // Assuming this is the percentage

                // Optionally, reduce the quantity of the coupon
                $coupon->quantity -= 1;
                $coupon->save();
            } else {
                // return redirect()->back()->with(['error' => 'Invalid or expired coupon code.']);
                return redirect('/' . '#pricing')->with(['error' => 'Invalid or expired coupon code']);
            }
        }

        $tenant_id = auth()->user()->tenant->id;
        $request->merge(['tenant_id' => $tenant_id]);

        $this->stripeService = $stripeService;

        $plan = Plan::find($request->plan_id);

        $data = $request->all();
        $data['product_name'] = $plan->title ?? 'Subscription Plan';
        $data['email'] = Auth::user()->email;

        // Calculate the amount considering the percentage discount
        $originalAmount = $plan->price ?? 0;
        $discountAmount = ($discountPercentage / 100) * $originalAmount; // Calculate the discount amount
        $amount = max(0, $originalAmount - $discountAmount); // Ensure amount is not negative
        $currency = 'usd';

        // Add request into session data
        session()->put('orderRequest', $request->all());
        session()->put('discountAmount',$amount);

        $successUrl = route('upgrade-plan.success');
        $cancelUrl = route('upgrade-plan.cancel');

        try {
            // Create a checkout session and redirect
            $redirectUrl = $this->stripeService->stripeCheckout($data, $successUrl, $cancelUrl, $currency, $amount);

            if ($redirectUrl) {
                return redirect($redirectUrl);
            } else {
                return redirect()->route('upgrade-plan.cancel')->with('error', 'Unable to initiate payment');
            }
        } catch (\Exception $e) {
            return redirect()->route('upgrade-plan.success')->with(['error' => $e->getMessage()]);
        }
    }



    public function upgradePlanSuccess(Request $request, StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
        $sessionId = $request->query('session_id');
        $response = $this->stripeService->stripeCheckoutSuccess($sessionId);

        if ($response) {
            $orderData = $response['session_data'];
            $cardDetails = $response['payment_method'];
            $transactionId = $response['transaction_id'] ?? '';

            try {
                $orderRequest = session()->get('orderRequest');
                $amount = session()->get('discountAmount', 0);


                $this->createSubsription($orderRequest, $transactionId,$amount);

                // Return success message or redirect
                return redirect()->route('site')->with('success', 'Plan purchased successfully!');
            } catch (\Exception $e) {
                // Handle any errors, log if necessary
                Log::error('Transaction failed: ' . $e->getMessage());
                return redirect()->route('site')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('upgrade-plan.success')->with('error', 'Failed to retrieve payment details');
        }
    }

    public function upgradePlanCancel()
    {
        session()->forget('orderRequest');
        return redirect('/' . '#pricing')->with(['error' => 'Payment has been cancelled']);
    }



    public function createSubsription($request, $transactionId,$amount)
    {

        $plan = Plan::find($request['plan_id']);
        $tenant = Tenant::find($request['tenant_id']);
        $startDate = now();
        $endDate = $startDate->copy()->addDays($plan['type'] == 'monthly' ? 30 : 365);

        $subscription = Subscription::create([
            'tenant_id' => $tenant->id,
            'plan_id' => $plan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'payment_status' => 'paid',
            'payment_method' => 'stripe',
        ]);

        $tenant->update(['plan_id' => $plan->id]);

        // add subscription payment
        SubscriptionPayment::create([
            'subscription_id' => $subscription->id,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'payment_date' => now(),
            'payment_method' => 'stripe',
            'payment_status' => 'paid',
        ]);

        $tenant->plan_id = $plan->id;
        $tenant->save();
    }
}
