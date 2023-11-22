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
    public function catWiseProduct($id)
    {

        $category = Category::findOrFail($id);
        $products = Product::where('category_id',$id)
                  ->where('status',1)
                  ->limit(20)
                  ->get();
        $wishlistItems = collect([]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }
         $categories        = Category::all();
         $brands            = Brand::all();
        return view('frontend.pages.categoryWiseProduct',compact('products','wishlistItems','categories','brands','category'));
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

        $wishlistItems = collect([]);


        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }

         $products = Product::with('gallery')->find($id);

         $product = Product::with('category')->find($id);


         $relatedProducts = Product::where('category_id', $product->category->id)
             ->where('id', '<>', $product->id)
             ->take(4)
             ->get();


        //Social share
        $routeName = 'details';
        $url = route($routeName, ['id' => $id]);
        $shareComponent = \Share::page(
            $url,
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

         return view('frontend.pages.productDetails',compact('products','wishlistItems','relatedProducts','shareComponent'));
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
