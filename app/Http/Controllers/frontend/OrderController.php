<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $product = Product::find($id);
        return view('frontend.pages.placeOrder',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function orderHistory()
    {
        $user = auth()->user();
        $orderHistory = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('frontend.pages.orderHistory',compact('orderHistory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
