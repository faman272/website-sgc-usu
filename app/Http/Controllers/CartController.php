<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $customer = auth()->user();
        $carts = Cart::where('customer_id', $customer->id)->get();
        $total = Cart::where('customer_id', $customer->id)->sum('subtotal');
        $total_berat = Cart::where('customer_id', $customer->id)->sum('total_berat');
        return view('shop.pages.cart', compact('carts', 'total', 'total_berat'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $customer = auth()->user();

        // Check if product exist, if exist just update the qty
        $cart = Cart::where('customer_id', $customer->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity,
                'total_berat' => $cart->total_berat + $request->berat,
                'subtotal' => $cart->subtotal + $request->harga_diskon,
            ]);
            toastr()->success('Dimasukkan Keranjang!', 'Success', ['timeOut' => 1500]);

            return redirect()->back();
        }

        Cart::create([
            'customer_id' => $customer->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_berat' => $request->berat,
            'subtotal' => $request->quantity * $request->harga_diskon,
        ]);

        toastr()->success('Dimasukkan Keranjang!', 'Success', ['timeOut' => 1500]);

        return redirect()->back();
    }

    // Button onclick to increment qty in cart table
    public function increment($id)
    {
        $cart = Cart::find($id);
        $cart->update([
            'quantity' => $cart->quantity + 1,
            'total_berat' => $cart->total_berat + $cart->product->berat,
            'subtotal' => $cart->subtotal + $cart->product->harga_diskon,
        ]);

        return redirect()->back();
    }

    // Button onclick to decrement qty in cart table
    public function decrement($id)
    {
        $cart = Cart::find($id);

        // If quantity equal to 1, delete the cart
        if ($cart->quantity == 1) {
            $cart->delete();
            return redirect()->back();
        }

        $cart->update([
            'quantity' => $cart->quantity - 1,
            'total_berat' => $cart->total_berat - $cart->product->berat,
            'subtotal' => $cart->subtotal - $cart->product->harga_diskon,
        ]);



        return redirect()->back();
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        toastr()->success('Produk dihapus dari keranjang!', 'Success', ['timeOut' => 1500]);

        return redirect()->back();
    }

}

