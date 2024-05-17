<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Province;
use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\DetailOrder;
use App\Models\PaymentMethod;

use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class CheckoutController extends Controller
{

    // Make function to make no_order random character start with 'SGC-'
    public function createOrder()
    {
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order = 'SGC-' . substr(str_shuffle($permitted_chars), 0, 10);
        return $order;
    }

    // Make function to make no_pembayaran random character start with 'SGC-'
    public function createPayment()
    {
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $payment = 'SGC-' . substr(str_shuffle($permitted_chars), 0, 10);
        return $payment;
    }


    public function index()
    {
        $customer = auth()->user();
        $carts = Cart::where('customer_id', $customer->id)->get();
        $total = Cart::where('customer_id', $customer->id)->sum('subtotal');
        $total_berat = Cart::where('customer_id', $customer->id)->sum('total_berat');

        // Get alamat
        $alamat = $customer->alamat;


        // IF USER DOES NOT HAVE ALAMAT SEND TOAST WARNING "ISI ALAMAT TERLEBIH DAHULU"
        if($alamat === null) {
            toastr()->info('Isi alamat terlebih dahulu', 'Info', ['timeOut' => 1500]);
            return redirect()->route('account.alamat');
        }

        // GET PROVINCE BY SPLIT ALAMAT
        $alamat = explode(', ', $alamat);

        // GET LENGTH ALAMAT
        $length = count($alamat);
        $getprovinsi = $alamat[$length - 2];

        $getkota = $alamat[$length - 3];

        // Remove 'Kota' & "Kabupaten" from string
        $kota = str_replace('Kota ', '', $getkota);
        $kota = str_replace('Kabupaten ', '', $kota);


        // GET PROVINCE ID
        $province = Province::where('name', $getprovinsi)->first();

        // GET CITY BY PROVINCE ID LIKE
        $city = City::where('name', $kota)->first();

        return view('shop.pages.checkout-alamat', compact('customer', 'total', 'total_berat', 'carts', 'city', 'province'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'ongkir' => 'required',
            'total' => 'required',
        ]);


        $no_order = $this->createOrder();
        $customer = auth()->user();
        $total = $request->total;
        $ongkir = $request->ongkir;

        // Carts from customer
        $carts = Cart::where('customer_id', $customer->id)->get();

        Order::create([
            'no_order' => $no_order,
            'customer_id' => $customer->id,
            'ongkir' => $ongkir,
            'total' => $total,
        ]);

        // add cart item to detail_orders
        foreach ($carts as $cart) {
            DetailOrder::create([
                'no_order' => $no_order,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'total_berat' => $cart->total_berat,
                'subtotal' => $cart->subtotal,
            ]);
        }
        // Delete Cart after checkout
        Cart::where('customer_id', $customer->id)->delete();

        toastr()->success('Pesanan berhasil dibuat', 'Success', ['timeOut' => 1500]);

        return redirect()->route('shop.checkout-payment', $no_order);

    }

    public function ongkir(Request $request, $id, $berat)
    {

        // Validate
        if ($request->kurir == []) {
            toastr()->info('Pilih jenis kurir!', 'Info', ['timeOut' => 2000]);
            return redirect()->back();
        }


        $customer = auth()->user();
        // Check tipe data $id dan $berat
        $id = (int) $id;
        $berat = (int) $berat;

        $params = [
            'origin' => 278,
            'destination' => $id,
            'weight' => $berat,
            'courier' => $request->kurir,
        ];

        // dd($params);

        try {
            $ongkir = RajaOngkir::ongkosKirim($params)->get();
        } catch (\Exception $e) {
            toastr()->error('Gagal mengambil data ongkir', 'Error', ['timeOut' => 2500]);
            return redirect()->back();
        }
        // $ongkir = RajaOngkir::ongkosKirim($params)->get();

        $dataOngkir = $ongkir[0]['costs'];

        $carts = Cart::where('customer_id', $customer->id)->get();
        $total = Cart::where('customer_id', $customer->id)->sum('subtotal');
        $total_berat = Cart::where('customer_id', $customer->id)->sum('total_berat');

        return view('shop.pages.checkout-ongkir', compact('dataOngkir', 'total', 'total_berat', 'carts'));


    }

    public function paymentMethod($no_order)
    {
        $payments = PaymentMethod::all();
        $order = Order::where('no_order', $no_order)->first();
        $jumlah_pesanan = DetailOrder::where('no_order', $no_order)->count();
        $subtotal = DetailOrder::where('no_order', $no_order)->sum('subtotal');
        $total_berat = DetailOrder::where('no_order', $no_order)->sum('total_berat');
        return view('shop.pages.checkout-payment', compact('payments', 'order', 'total_berat', 'jumlah_pesanan', 'subtotal'));
    }

    // insert data to tabel payment
    public function storePayment(Request $request)
    {

        // Validate
        $request->validate([
            'payment_method' => 'required',
        ]);

        $no_pembayaran = $this->createPayment();

        Payment::create([
            'no_pembayaran' => $no_pembayaran,
            'no_order' => $request->no_order,
            'kode_pembayaran' => $request->payment_method,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        // Make toast position top-center
        toastr()->info('Silahkan lakukan pembayaran', 'Info', ['timeOut' => 2500]);

        return redirect()->route('shop.checkout-konfirmasi', $no_pembayaran);

    }

    public function konfirmasiPembayaran($no_pembayaran)
    {
        $customer = auth()->user();
        $payment = Payment::where('no_pembayaran', $no_pembayaran)->first();
        // Get product item in detail order
        $detail_orders = DetailOrder::where('no_order', $payment->no_order)->get();

        $subtotal = DetailOrder::where('no_order', $payment->no_order)->sum('subtotal');

        return view('shop.pages.checkout-konfirmasi', compact('payment', 'customer', 'detail_orders', 'subtotal'));
    }


    // STORE FILE UPLOAD IN PAYMENT BUKTI_PEMBAYARAN
    public function storeBuktiPembayaran(Request $request, $no_pembayaran)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $payment = Payment::where('no_pembayaran', $no_pembayaran)->first();

        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $bukti_pembayaran_name = time() . '_' . $bukti_pembayaran->getClientOriginalName();
        $bukti_pembayaran->move(public_path('bukti_pembayaran'), $bukti_pembayaran_name);

        $payment->update([
            'bukti_pembayaran' => $bukti_pembayaran_name,
        ]);

        // update status order
        Order::where('no_order', $payment->no_order)->update([
            'status' => 'menunggu konfirmasi',
        ]);

        toastr()->success('Bukti pembayaran berhasil diupload', 'Success', ['timeOut' => 2500]);

        return redirect()->route('shop.checkout-success', $payment->no_order);
    }


    // Order Accepted Page
    public function orderDiterima($no_order)
    {
        $customer = auth()->user();
        $no_pesanan = $no_order;
        return view('shop.pages.checkout-sukses', compact('customer', 'no_pesanan'));
    }







}
