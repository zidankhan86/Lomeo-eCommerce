<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function addToCart($productId){
   // Find the product
   $product = Product::find($productId);

   // Check if the product exists
   if (!$product) {
       return back()->with('error', 'Product not found');
   }

   // Get the authenticated user's ID
   $userId = auth()->user()->id;

   // Add the product to the cart
   \Cart::session($userId)->add(array(
       'id' => $product->id, // Use the actual product ID
       'name' => $product->name,
       'price' => $product->price,
       'quantity' => 1, // Set the initial quantity as 1
       'attributes' => array(),
       'associatedModel' => $product
   ));

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



        $totalPrice = 0; // Initialize the total price

                foreach ($cartContents as $item) {
            $itemTotalPrice = $item->price * $item->quantity;
            $totalPrice += $itemTotalPrice;
        }

        $wishlistItems = collect([]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $wishlistItems = Auth::user()->wishlistProducts;
        }

       return view('frontend.pages.addToCart', compact('cartContents','userId','subTotal','total','totalPrice','wishlistItems'));
   }


   public function clearCart()
   {
       // Retrieve the currently authenticated user
       $user = auth()->user();

       // Clear the cart for the user
       \Cart::session($user->id)->clear();

       return redirect()->route('cart.show')->with('success', 'Cart cleared successfully.');
   }

}
