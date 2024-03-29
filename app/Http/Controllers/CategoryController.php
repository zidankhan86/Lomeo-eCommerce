<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //Frontend page
    public function index()
    {
        return view('frontend.pages.category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.categoryForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $imageName,
            'slug' => Str::slug($request->name),

        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('backend.pages.categoryEdit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Category::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $imageName = $request->input('current_thumbnail');
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        $update->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $imageName,
            'slug' => Str::slug($request->name),

        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function list()
    {
        $categories = Category::all();

        return view('backend.pages.categoryList', compact('categories'));
    }
}
