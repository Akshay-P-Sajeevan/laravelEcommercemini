<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    public function index()
    {
        $orders = Order::with('product')->paginate(10);
        return response()->json($orders);
    }
}
