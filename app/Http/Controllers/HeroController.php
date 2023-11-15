<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('backend.pages.heroForm');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list()
    {
        $heros = Hero::all();
        return view('backend.pages.heroList',compact('heros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //dd($request->all());
       $request->validate([
        'welcome_title' => 'required|max:255',
        'image' => 'required',
        'title' => 'required',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    // Create the product
    Hero::create([
        'welcome_title' => $request->welcome_title,
        'image' => $imageName,
        'title' => $request->title,
        'discount' => $request->discount,

    ]);

    return redirect()->back()->with('success', 'Banner created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $delete = Hero::find($id);
        $delete->delete();
        return back()->with('success','Hero deleted');
    }
}
