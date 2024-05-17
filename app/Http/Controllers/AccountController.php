<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Payment;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $customer = Customer::find(auth()->id());
        return view('shop.pages.account', compact('customer'));
    }


    // View alamat
    public function alamat()
    {
        $customer = Customer::find(auth()->id());
        return view('shop.pages.kelola-alamat', compact('customer'));
    }

    // Manage address update customers
    public function update(Request $request)
    {

        // Validate
        
       $request->validate([
            'nomor_telepon' => 'required',
            'jalan' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',   
        ]);



        // Alamat disatukan menjadi satu dengan urutan: jalan, kelurahan, kecamatan, kota, provinsi, kode_pos
        $alamat = $request->jalan . ', ' . $request->kelurahan . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->provinsi . ', ' . $request->kode_pos;

        $customer = Customer::find(auth()->id());

        
        $customer->update([
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $alamat,
        ]);

        if($customer->carts()->count() > 0) {
            toastr()->success('Alamat berhasil diupdate', 'Success', ['timeOut' => 1500]);
            return redirect()->route('cart.index');
        }

        toastr()->success('Alamat berhasil diupdate', 'Success', ['timeOut' => 1500]);

        return redirect()->route('account.index');
    }


    public function orderHistory()
    {
        $customer = Customer::find(auth()->id());

        // get order
        $orders = $customer->orders;


        return view('shop.pages.order-history', compact('customer', 'orders'));
    }


    public function showOrder($no_pembayaran)
    {
        
        $customer = auth()->user();
        $payment = Payment::where('no_pembayaran', $no_pembayaran)->first();
        // Get product item in detail order
        $detail_orders = DetailOrder::where('no_order', $payment->no_order)->get();

        $subtotal = DetailOrder::where('no_order', $payment->no_order)->sum('subtotal');

        return view('shop.pages.show-order', compact('customer', 'detail_orders', 'payment', 'subtotal'));
    }


}
