<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Plan;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::with('user')->latest()->get();
        $plans = Plan::select('id', 'title','type')->get();
        return view('super-admin.dashboard.customers.index', compact('tenants','plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.dashboard.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:255|unique:tenants,subdomain',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new tenant
        // $tenant = Tenant::create([
        //     'name' => $request->name,
        //     'subdomain' => $request->subdomain,
        // ]);

        // Create a new user for the tenant
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);
        // Assign the user to the tenant
        Tenant::create([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'user_id' => $user->id,
        ]);
        $user->assignRole('Admin');

        return redirect()->route('super.customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Update the tenant
        $tenant = Tenant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:255|unique:tenants,subdomain,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $tenant->user_id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);


        $tenant->name = $request->name;
        $tenant->subdomain = $request->subdomain;
        $tenant->save();

        // Update the user
        $user = User::findOrFail($tenant->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('super.customers.index')->with('success', 'Customer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the tenant
        $tenant = Tenant::findOrFail($id);

        $user_id = $tenant->user_id;

        // Delete the tenant
        $tenant->delete();

        // Find and delete the associated user
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('super.customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function addPlanToCustomers(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'customer_id' => 'required|exists:tenants,id',
        ]);

        $tenant = Tenant::findOrFail($request->customer_id);
        $tenant->plan_id = $request->plan_id;
        $tenant->save();

        $plan = Plan::findOrFail($request->plan_id);

        $end_date = $plan->type == 'monthly' ? now()->addMonth() : now()->addYear();

        Subscription::create([
            'tenant_id' => $tenant->id,
            'plan_id' => $request->plan_id,
            'start_date' => now(),
            'end_date' => $end_date,
        ]);

        return redirect()->route('super.customers.index')->with('success', 'Plan added to customer successfully.');
    }
}
