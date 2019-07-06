<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('order_details')
            ->where('id','=',$id)
            ->first();
        return view('admin.order.show',compact('order'));
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
        //
    }

    public function getProcessing()
    {
        $orders = Order::where('status','=',1)->paginate(5);
        return view('admin.order.browse',compact('orders'));
    }

    public function processing(Request $request, $id)
    {
//        $id = $request->id;
        $shipper_id = $request->shipper_id;
        $order = Order::where('id','=',$id)
            ->update(['status'=>2,'shipper_id'=>$shipper_id]);
        return redirect()->back();

    }

    public function getExportOrder()
    {
        $orders = Order::where('status','=',2)->paginate(5);
        return view('admin.order.export',compact('orders'));
    }

    public function exportOrder(Request $request, $id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>3]);
        return redirect()->back();

    }

    public function getShippedOrder()
    {
        $orders = Order::where('status','=',3)/*->where('shipper_id','=',auth()->user()->id)*/->paginate(5);
        return view('admin.order.export',compact('orders'));
    }

    public function shippedOrder(Request $request, $id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>3]);
        return redirect()->back();

    }
}
