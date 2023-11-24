<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchKey = $request->search_key;

        if (empty($searchKey)) {
            return redirect()->back()->with(['error' => 'Please enter a search key.'], 400);
        }

        $search = Product::where('name', 'like', '%' . $searchKey . '%')->get();

        $wishlistItems = collect([]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }

        return view('frontend.pages.search',compact('search','wishlistItems'));
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
