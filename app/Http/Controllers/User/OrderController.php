<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->paginate(10);
        return view('user.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!Auth::user()->orders->contains($order)) {
            abort(404);
        }
        return view('user.orders.show', compact('order'));
    }
}
