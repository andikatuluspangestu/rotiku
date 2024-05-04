<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Halaman Daftar Pesanan
    public function index()
    {
        $title  = 'Daftar Pesanan';
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('title', 'orders'));
    }

    // Halaman Detail Pesanan
    public function show($id)
    {
        $title  = 'Detail Pesanan';
        $order  = Order::findOrFail($id);
        
        // Ambil nilai product_id dari data order di atas
        $product = $order->products;
    
        return view('admin.orders.show', compact('title', 'order', 'product'));
    }
    

    // Proses Konfirmasi Pembayaran
    public function confirmPayment(Request $request, $id)
    {
        // Cek data pesanan berdasarkan ID Order 
        $order = Order::where('id', $id)->first();

        $order->update([
            'payment_status' => 'paid',
        ]);

        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil.');
    }

}
