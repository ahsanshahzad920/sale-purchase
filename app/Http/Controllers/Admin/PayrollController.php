<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Payroll::latest()->get();
        $employees = Employee::all();
        $accounts = Account::all();
        return view('back.hrm.payroll.index',compact('payrolls','employees','accounts'));
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
            'employee_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'payment_method' => 'required'
        ]);

        $data = $request->all();
        $data['reference'] = Str::random(6);
        $data['payment_status'] = "Paid";
        Payroll::create($data);

        return redirect()->back()->with('success','Payroll created successfully');
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
        $request->validate([
            'employee_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'payment_method' => 'required'
        ]);

        $payroll = Payroll::find($id);
        $payroll->update($request->all());
        return redirect()->back()->with('success','Payroll updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();
        return redirect()->back()->with('success','Payroll deleted successfully');
    }
}
