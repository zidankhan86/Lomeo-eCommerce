<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $totalProducts           = Product::get()->count();
        $totalCustomers          = User::get()->count();
        $totalBrands             = Brand::get()->count();
        $totalOrders             = Order::get()->count();
        $totalOrdersDelivered    = Order::where('status','Delivered')->get()->count();
        $totalOrdersPending      = Order::where('status','processing')
                                        ->orWhere('status','pending')
                                        ->orWhere('status','Ship')
                                        ->get()->count();
        $testimonials            = Testimonial::get()->count();
        $totalCategories         = Category::get()->count();
        $totalCategoryActive         = Category::where('status','1')->count();
          return view('backend.pages.dashboard',compact('totalProducts',
                                                        'totalCustomers',
                                                        'totalBrands',
                                                        'totalOrders',
                                                        'totalOrdersDelivered',
                                                        'totalOrdersPending',
                                                        'testimonials',
                                                        'totalCategories','totalCategoryActive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
