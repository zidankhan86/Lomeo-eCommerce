<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    //Product Form
    public function index()
    {
        $categories = Category::all();
        $brands     = Brand::all();
       return view('backend\pages\productForm',compact('categories','brands'));
    }

    public function list()
    {
       return view('backend.pages.productList');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|max:255',
            'price'                 => 'required|numeric',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif',
            'long_description'      => 'required',
            'short_description'     => 'required',
            'thumbnail'             => 'required',
            'stock'                 => 'required',
            'status'                => 'boolean',
            'discount'              => 'nullable',
            'category_id'           => 'required|exists:categories,id',
            'image'                 => 'nullable',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        Product::create([
            'name' => $request->name,
            'long_description'      => $request->long_description,
            'short_description'     => $request->short_description,
            'price'                 => $request->price,
            'slug'                  => Str::slug($request->name),
            'featured'              => $request->input('featured', true),
            'thumbnail'             => $request->thumbnail,
            'stock'                 => $request->stock,
            'status'                => $request->input('status', true),
            'discount'              => $request->discount,
            'category_id'           => $request->category_id,
            'brand_id'              => $request->brand_id,
            'image'                 => $imageName,
        ]);

        return redirect()->back()->with('success', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
