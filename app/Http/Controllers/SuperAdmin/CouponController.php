<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Plan;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all coupons from the database
        $coupons = Coupon::all();

        // Return a view with the coupons data
        return view('super-admin.dashboard.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::all(); 
        // Return a view to create a new coupon
        return view('super-admin.dashboard.coupons.create',compact('plans'));
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
            'code' => 'required|string|max:255|unique:coupons',
            'plan_id' => 'required|exists:plans,id',
            'discount' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
        ]);

        // Create a new coupon with the validated data
        Coupon::create([
            'plan_id' => $request->plan_id,
            'name' => $request->name,
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('super.coupons.index')->with('success', 'Coupon created successfully.');

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
        $coupon = Coupon::findOrFail($id);
        $plans = Plan::all(); 

        // Return a view to edit the coupon
        return view('super-admin.dashboard.coupons.edit', compact('coupon', 'plans'));
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
        $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code,' . $id,
            'plan_id' => 'required|exists:plans,id',
            'discount' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
        ]);

        // Find the coupon and update it with the validated data
        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'plan_id' => $request->plan_id,
            'name' => $request->name,
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('super.coupons.index')->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the coupon by ID and delete it
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('super.coupons.index')->with('success', 'Coupon deleted successfully.');
    }
}
