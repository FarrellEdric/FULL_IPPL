<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user', 'payment')->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        $cart = session()->get('cart', []);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $availableTables = Table::doesntHave('activeBooking')->get();

        return view('orders.create', compact('products', 'cart', 'totalAmount', 'availableTables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'customer_name' => 'required|string|max:255',
    //         'order_date' => 'required|date',
    //         'table_id' => 'nullable|exists:tables,id',
    //         'payment_method' => 'required|in:cash,midtrans',
    //     ]);

    //     $cart = session()->get('cart', []);
    //     if(empty($cart)) {
    //         return redirect()->back()->with('error', 'Keranjang kosong! Silahkan tambah produk dulu.');
    //     }

    //     $totalAmount = 0;
    //     foreach ($cart as $id => $item) {
    //         $totalAmount += ($item['price'] * $item['quantity']);
    //     }

    //     try {
    //         DB::beginTransaction();

    //         $bookingId = null;

    //         if($request->table_id) {
    //             $booking = Booking::create([
    //                 'table_id' => $request->table_id,
    //                 'user_id' => Auth::id(),
    //                 'status' => 'filled'
    //             ]);

    //             $bookingId = $booking->id;
    //         }

    //         $trx_id = Payment::generateTransactionId();

    //         $order = Order::create([
    //             'user_id' => Auth::id(),
    //             'booking_id' => $bookingId,
    //             'customet_name' => $request->customer_name,
    //             'order_date' => $request->order_date,
    //             'total_amount' => $totalAmount,
    //         ]);

    //         $payment = Payment::create([
    //             'order_id' => $order->id,
    //             'amount' => $totalAmount,
    //             'payment_method' => $request->payment_method,
    //             'status' => ($request->payment_method == 'cash') ? 'paid' : 'unpaid',
    //             'payment_date' => $request->order_date,
    //             'transaction_id' =>$trx_id, 
    //         ]);

    //         foreach ($cart as $productId => $item) {
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'product_id' => $productId,
    //                 'quantity' => $item['quantity'],
    //                 'price' => $item['price'],
    //             ]);
    //         }

            
    //     }


    // }

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
