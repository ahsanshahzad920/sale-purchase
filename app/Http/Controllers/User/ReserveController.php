<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReserveOrder;
use App\Services\ReserveOrderService;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct( protected ReserveOrderService $reserveOrder)
     {

     }

    public function index()
    {
        $orders = $this->reserveOrder->customerAllOrders();
        return view('user.order.reserved-order',compact('orders'));
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
            'order_number' => 'required',
            'ship_to' => 'required',
            'location' => 'required',
            'total' => 'required',
            'date' => 'required',
        ]);
        // dd($data);
        $data = $request->all();
        $data['customer_id'] = auth()->id();
        $this->reserveOrder->create($data);
        return redirect()->back()->with('success','Order has been reserved successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->reserveOrder->delete($id);
        return redirect()->back()->with('success','Order has been deleted successfully');
    }
}
