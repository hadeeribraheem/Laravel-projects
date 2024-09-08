<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/*********************************    Cart Controller dont implemented     *******************************/

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        // Fetch the existing cart from session, or create an empty one
        $cart = session()->get('cart', []);

        // If the product is already in the cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Otherwise, add the product to the cart
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->images->first()->name ?? 'default.png'
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Display the cart
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Update the quantity of a product in the cart
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    /**
     * Remove a product from the cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart.');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }
}
