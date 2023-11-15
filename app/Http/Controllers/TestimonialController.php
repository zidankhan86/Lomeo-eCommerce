<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $testimonials = Testimonial::all();
        return view('backend.pages.testimonialList',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // Create the product
        Testimonial::create([
            'name' => $request->name,
            'image' => $imageName,
            'position' => $request->position,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Testimonial created successfully');
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
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.pages.testimonialEdit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $update = Testimonial::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // Create the product
        $update->update([
            'name' => $request->name,
            'image' => $imageName,
            'position' => $request->position,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $delete = Testimonial::find($id);
        $delete->delete();
        toastr()->info('Deleted');
        return back();
    }
}
