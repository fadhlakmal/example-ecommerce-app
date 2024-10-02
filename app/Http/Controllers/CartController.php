<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart() {
        $cart = Cart::first();
        return view('cart.view', compact('cart'));
    }

    public function addToCart(Request $request, Item $item)
    {
        $cart = Cart::firstOrCreate();

        $cartItem = CartItem::firstOrNew(['cart_id' => $cart->id, 'item_id' => $item->id]);
        $cartItem->quantity += $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.view')->with('success', 'Item added to cart.');
    }

    public function checkout() {
        $cart = Cart::first();
        if (!$cart) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        foreach ($cart->items as $cartItem) {
            $item = $cartItem->item;
            if ($item->stock < $cartItem->quantity) {
                return back()->with('error', 'Not enough stock for ' . $item->name);
            }

            $item->stock -= $cartItem->quantity;
            $item->save();
        }

        $cart->items()->delete();

        return redirect()->route('cart.view')->with('success', 'Checkout completed.');
    }
}
