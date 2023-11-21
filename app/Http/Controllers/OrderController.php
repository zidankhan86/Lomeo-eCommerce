<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function orderList()
    {
        $orders = Order::all();
        Product::with('product')->where('name');
        return view('backend.pages.orderList',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function orderOnTheWay($id)
    {
        $status = Order::findOrFail($id);

        $status->update([

            "status"=>"Ship"
        ]);

        return redirect()->back()->with('success','Status updated successfully');
    }

    public function orderCompleted($id)
    {
        $status = Order::findOrFail($id);

        $status->update([

            "status"=>"Delivered"
        ]);

        return redirect()->back()->with('success','Status updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function orderInvoice( $id)
    {
        $inv = Order::find($id);
        return view('backend.components.order.invoice',compact('inv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
