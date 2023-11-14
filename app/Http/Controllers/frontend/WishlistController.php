<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlistItems = Auth::user()->wishlistProducts;
        $productIds = $wishlistItems->pluck('id');
        $products = Product::whereIn('id', $productIds)->get();

        return view('frontend.pages.wishlist', compact('wishlistItems', 'products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function addToWishlist( Request $request ,$id)
    {
        $user = Auth::user();

    // Check if the product is already in the wishlist
    if (!$user->wishlistProducts->contains('id', $id)) {
        // Create a new wishlist item
        $wishlistItem = new Wishlist(['product_id' => $id, 'user_id' => $user->id]);

        // Save the wishlist item
        $wishlistItem->save();

        return redirect()->route('home')->with('success', 'Product added to wishlist successfully.');
    }

    return redirect()->route('home')->with('error', 'Product is already in the wishlist.');
}

    public function removeFromWishlist($id)
    {

        try {
        // Find the wishlist item for the authenticated user and the given product ID
        $wishlistItem = Wishlist::where('user_id', auth()->user()->id)
        ->where('product_id', $id)
        ->firstOrFail();
            // Ensure the authenticated user owns the wishlist item
            if ($wishlistItem->user_id !== auth()->user()->id) {
                return redirect()->route('product.page')->with('error', 'You do not have permission to remove this product from the wishlist.');
            }

            // Remove the Wishlist item
            $wishlistItem->delete();

            return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('wishlist.index')->with('error', 'Product not found in the wishlist.');
        } catch (\Exception $e) {
            return redirect()->route('wishlist.index')->with('error', 'An error occurred while removing the product from the wishlist.');
        }

    }



    public function addToCartFromWishlist($id)
    {
        // Find the product in the wishlist
        $wishlistItem = Wishlist::where('user_id', auth()->user()->id)
            ->where('product_id', $id)
            ->first();

        if ($wishlistItem) {
            // Use the quantity from the wishlist item, or set a default of 1
            $quantity = $wishlistItem->quantity ?? 1;

            // Add the product to the cart
            \Cart::session(auth()->user()->id)->add(
                $wishlistItem->product->id,
                $wishlistItem->product->name,
                $quantity,
                $wishlistItem->product->price,
                ['image' => $wishlistItem->product->image]
            );

            // Remove the product from the wishlist
            $wishlistItem->delete();

            return redirect()->route('wishlist.index')->with('success', 'Product moved to cart successfully.');
        }

        return redirect()->route('wishlist.index')->with('error', 'Product not found in the wishlist.');
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
