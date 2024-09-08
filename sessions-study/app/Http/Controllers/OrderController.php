<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart_' . auth()->id(), []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Your cart is empty');
        }
        DB::beginTransaction();
            $order = new Order();
            $order->user_id = auth()->id();
            $order->total_price = array_sum(array_column($cart, 'price')) * array_sum(array_column($cart, 'quantity'));
            $order->save();

            // Create order items
            foreach ($cart as $id => $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $id;
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->save();

                // Decrement the product quantity in the database
                $product = Products::find($id);
                if ($product) {
                    // Ensure there is enough stock
                    if ($product->quantity >= $item['quantity']) {
                        $product->quantity -= $item['quantity'];
                        $product->save();
                    } else {
                        // If stock is insufficient, rollback the transaction
                        DB::rollback();
                        return redirect()->route('products.index')->with('error', 'Not enough stock for product: ' . $product->name);
                    }
                }
            }

            // Clear the cart
            session()->forget('cart_' . auth()->id());

            // Commit the transaction
            DB::commit();

            // Redirect with a success message
            return redirect()->route('products.index')->with('success', 'Purchase completed successfully!');


    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.order_details', compact('order'));
    }
    public function updateStatus(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}
