<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->paginate(10);
        return view('admin.users.show', compact('user', 'orders'));
    }
}
