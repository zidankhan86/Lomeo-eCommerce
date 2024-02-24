<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $brands = Brand::all();
        Category::with('category')->where('name');

        return view('backend.pages.brandList', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();

        return view('backend.pages.brandForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // Create the product
        Brand::create([
            'name' => $request->name,
            'image' => $imageName,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('success', 'Brand created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brand = Brand::find($id);

        return view('backend.pages.brandEdit', compact('categories', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Brand::find($id);

        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = $request->input('current_thumbnail');
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // Create the product
        $update->update([
            'name' => $request->name,
            'image' => $imageName,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('brand.list')->with('success', 'Brand updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
