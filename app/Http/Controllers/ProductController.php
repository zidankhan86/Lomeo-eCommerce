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
        $products   = Product::all();
        Category::with('category')->where('name');
        Brand::with('brand')->where('name');

        return view('backend.pages.productList',compact('products'));
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
        if ($request->hasFile('thumbnail')) {
            $imageName = date('YmdHis') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
        }

        Product::create([
            'name'                  => $request->name,
            'long_description'      => $request->long_description,
            'short_description'     => $request->short_description,
            'price'                 => $request->price,
            'slug'                  => Str::slug($request->name),
            'featured'              => $request->input('featured', true),
            'thumbnail'             => $imageName,
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
    public function edit( $id)
    {
         $product = Product::find($id);
         $categories = Category::all();
         $brands = Brand::all();
         return view('backend.pages.productEdit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $update = Product::find($id);
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
        if ($request->hasFile('thumbnail')) {
            $imageName = date('YmdHis') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
        }

        $update->update([
            'name'                  => $request->name,
            'long_description'      => $request->long_description,
            'short_description'     => $request->short_description,
            'price'                 => $request->price,
            'slug'                  => Str::slug($request->name),
            'featured'              => $request->input('featured', true),
            'thumbnail'             => $imageName,
            'stock'                 => $request->stock,
            'status'                => $request->input('status', true),
            'discount'              => $request->discount,
            'category_id'           => $request->category_id,
            'brand_id'              => $request->brand_id,
            'image'                 => $imageName,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
