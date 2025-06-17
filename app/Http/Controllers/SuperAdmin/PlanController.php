<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('index');
        // Fetch all plans from the database
        $plans = Plan::latest()->get();
        return view('super-admin.dashboard.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form to create a new plan
        return view('super-admin.dashboard.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['created_by'] = auth()->user()->id;

        // Create a new plan
        $plan = Plan::create($data);

        // add plan features to plan_features table
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $plan->features()->create([
                    'feature_name' => $feature['name'],
                    'is_enabled' => isset($feature['is_enabled']) ? 1 : 0,
                    'limit' => $feature['limit'] ?? -1,
                ]);
            }
        }


        // Redirect to the plans index with a success message
        return redirect()->route('super.plans.index')->with('success', 'Plan created successfully.');
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
        // Find the plan by ID
        $plan = Plan::findOrFail($id);
        // Load the features associated with the plan
        $plan->load('features');

        // Show the form to edit the plan
        return view('super-admin.dashboard.plans.edit', compact('plan'));
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
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Find the plan by ID
        $plan = Plan::findOrFail($id);

        // Update the plan with the new data
        $plan->update($request->all());

        // Update plan features
        if ($request->has('features')) {
            // Clear existing features
            $plan->features()->delete();

            // Add new features
            foreach ($request->features as $feature) {
                $plan->features()->create([
                    'feature_name' => $feature['name'],
                    'is_enabled' => isset($feature['is_enabled']) ? 1 : 0,
                    'limit' => $feature['limit'] ?? -1,
                ]);
            }
        }

        // Redirect to the plans index with a success message
        return redirect()->route('super.plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the plan by ID
        $plan = Plan::findOrFail($id);

        // Delete the plan
        $plan->delete();

        // Redirect to the plans index with a success message
        return redirect()->route('super.plans.index')->with('success', 'Plan deleted successfully.');

    }
}
