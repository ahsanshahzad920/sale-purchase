<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomDomain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = CustomDomain::where('tenant_id', app('currentTenant')->id)->get();
        return view('back.domain.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);

        $domain = new CustomDomain();
        $domain->tenant_id = app('currentTenant')->id;
        $domain->name = $request->name;
        $domain->status = 'pending'; // Default status
        $domain->save();
        return redirect()->route('domain.index')->with('success', 'Domain added successfully.');

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
    public function update(Request $request,$subdomain, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $domain = CustomDomain::findOrFail($id);
        $domain->name = $request->name;
        $domain->save();

        return redirect()->route('domain.index')->with('success', 'Domain updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subdomain,$id)
    {
        $domain = CustomDomain::findOrFail($id);
        $domain->delete();

        return redirect()->route('domain.index')->with('success', 'Domain deleted successfully.');
    }
}
