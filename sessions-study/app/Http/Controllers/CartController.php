<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        //1. Get product details
        //2. Get the user's cart from the session
        //3. If the product is already in the cart, increase the quantity
        //4. Check if the requested quantity exceeds the available stock
        //5. Ensure the stock is added to the existing cart item
        //6. If the product is not in the cart, add it with a quantity of 1


        $product = Products::findOrFail($id);


        $cart = session()->get('cart_' . auth()->id(), []);


        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $product->quantity) {
                $cart[$id]['quantity']++;
            } else {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }

            if (!isset($cart[$id]['stock'])) {
                $cart[$id]['stock'] = $product->quantity; // Add stock key
            }

        } else {
            if ($product->quantity > 0) {
                $cart[$id] = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->images->first()->name ?? 'No image available',
                    'stock' => $product->quantity // Available stock
                ];
            } else {
                return redirect()->back()->with('error', 'This product is out of stock.');
            }
        }

        //7. Save the cart back into the session
        session()->put('cart_' . auth()->id(), $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /** Display the cart **/
    public function index()
    {
        // 1. Retrieve the cart from the session for the specific authenticated user
        // 2. Check if the cart is empty
        // 3. Pass the cart data to the view
        // 4. Calculate the total price
        $cart = session()->get('cart_' . auth()->id(), []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        //dd($cart);
        return view('cart.index', compact('cart','total'));
    }

    /**
     * Update the quantity of a product in the cart
     */
    public function update(Request $request, $id)
    {
        // Retrieve the user's cart from the session using their user ID
        $cart = session()->get('cart_' . auth()->id(), []);

        // Check if the product exists in the cart
        if (isset($cart[$id])) {
            // Update the quantity of the product
            $cart[$id]['quantity'] = $request->quantity;

            // Save the updated cart back into the session
            session()->put('cart_' . auth()->id(), $cart);

            return redirect()->back()->with('success', 'Cart updated!');
        }

        // If the product was not found in the cart, return an error message
        return redirect()->back()->with('error', 'Product not found in cart.');
    }


    /**
     * Remove a product from the cart
     */
    public function remove($id)
    {
        // Get the user's cart from the session
        $cart = session()->get('cart_' . auth()->id(), []);

        // If the product exists in the cart, remove it
        if (isset($cart[$id])) {
            unset($cart[$id]);

            // Update the cart in the session
            session()->put('cart_' . auth()->id(), $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

}
