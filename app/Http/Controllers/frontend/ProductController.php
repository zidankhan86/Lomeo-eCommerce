<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function index()
    {
        $wishlistItems = collect([]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }
         $categories        = Category::all();
         $products          = Product::all();
         $brands            = Brand::all();
        return view('frontend.pages.product',compact('products','wishlistItems','categories','brands'));
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
    public function show( $id)
    {

        //  $products = Product::find($id);
         $products = Product::with('gallery')->find($id);
        //  Gallery::with('product')->where('images');
         return view('frontend.pages.productDetails',compact('products'));
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
