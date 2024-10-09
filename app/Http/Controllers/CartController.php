<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($productId)
    {

        $product = Product::find($productId);

        if (! $product) {
            return back()->with('error', 'Product not found');
        }

        $userId = auth()->user()->id;

        \Cart::session($userId)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $product,
        ]);

        return back()->with('success', 'Product added to the cart');

    }

    public function removeFromCart(Product $product)
    {

        $userId = auth()->user()->id;
        $rowId = $product->id;
        \Cart::session($userId)->remove($rowId);

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    public function showCart()
    {

        $userId = auth()->user();

        $cartContents = \Cart::session(auth()->user()->id)->getContent();

        $subTotal = \Cart::session($userId)->getSubTotal();

        $total = \Cart::getTotal();

        $totalPrice = 0;

        foreach ($cartContents as $item) {
            $itemTotalPrice = $item->price * $item->quantity;
            $totalPrice += $itemTotalPrice;
        }

        $wishlistItems = collect([]);

        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }

        return view('frontend.pages.addTocart', compact('cartContents', 'userId', 'subTotal', 'total', 'totalPrice', 'wishlistItems'));
    }

    public function clearCart()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Clear the cart for the user
        \Cart::session($user->id)->clear();

        return redirect()->route('cart.show')->with('success', 'Cart cleared successfully.');
    }

    public function updateCart(Request $request, $productId)
{
    // Validate quantity input
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $userId = auth()->user()->id;
    $quantity = intval($request->input('quantity'));  // Ensure quantity is an integer

    // Find the cart item
    $cartItem = \Cart::session($userId)->get($productId);

    if (!$cartItem) {
        return back()->with('error', 'Product not found in the cart.');
    }

    // Find the product by ID to check its stock
    $product = Product::find($productId);

    if (!$product) {
        return back()->with('error', 'Product not found.');
    }

    // Check if product stock is sufficient
    if ($product->stock < $quantity) {
        // Not enough stock
        return back()->with('error', 'Out of stock.');
    }

    // Update the quantity of the product in the cart
    \Cart::session($userId)->update($productId, [
        'quantity' => array(
            'relative' => false,
            'value' => $quantity
        ),
    ]);

    return back()->with('success', 'Product quantity updated.');
}

    

}
