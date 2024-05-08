<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Income;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Admin Dashboard';

        // Ambil data user, product, catgories dan order
        $users      = User::all();
        $products   = Product::all();
        $orders     = Order::all();
        $categories = Category::all();
        $customers  = User::where('role', 'user')->get();

        // Data Pesanan Selesai
        $ordersCompleted = Order::where('shipping_status', 'completed')->get();

        // Data Pemasukan (jumlah amount keseluruhan)
        $incomes = Income::all();

        // Data Pesanan per Bulan
        $ordersPerMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
        ->groupBy('month')
        ->get();

        $data = [
            'title' => $title,
            'users' => $users,
            'products' => $products,
            'orders' => $orders,
            'categories' => $categories,
            'customers' => $customers,
            'ordersCompleted' => $ordersCompleted,
            'incomes' => $incomes,
            'ordersPerMonth' => $ordersPerMonth
        ];

        return view('admin.dashboard', $data);
    }
}