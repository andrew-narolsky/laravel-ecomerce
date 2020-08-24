<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function new()
    {
        $orders = Order::where('status', 0)->paginate(10);
        return view('admin.orders.new', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $order->status = 1;
        $order->save();
        session()->flash('success', 'Замовлення підтверджено!');
        return redirect()->back();
    }
}
