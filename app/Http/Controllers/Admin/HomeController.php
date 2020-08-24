<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)->paginate(10);
        $all_orders = Order::get();
        $orders_count = $all_orders->count();
        $users_count = (User::get())->count();
        $products_count = (Product::get())->count();
        $orders_price = 0;
        foreach ($all_orders as $order) {
            $orders_price = $orders_price + (int)$order->total;
        }
        return view('admin.index', compact('orders', 'orders_count', 'users_count', 'products_count', 'orders_price'));
    }
}
