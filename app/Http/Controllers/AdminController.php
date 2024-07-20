<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function showProducts()
    {
        $products = Product::where('is_deleted', false)->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function showOrders()
    {
        $orders = Order::with('product')->paginate(10);
        return view('admin.orders', compact('orders'));
    }
}

