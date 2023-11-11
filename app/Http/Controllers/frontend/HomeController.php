<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $wishlistItems     = Auth::user()->wishlistProducts;
         $categories        = Category::all();
         $products          = Product::all();
         $brands            = Brand::all();
         $featuredProducts  = Product::where('featured', 1)->get();
         $latestProducts    = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('frontend.pages.home',compact('products','brands',
                    'featuredProducts','categories','latestProducts',
                    'wishlistItems'));
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
