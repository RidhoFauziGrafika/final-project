<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderUserController extends Controller
{
    public function index()
    {
        $orders = Order::with(['field', 'user'])->where('users_id', auth()->user()->id)->get();
        return view('home/order', compact('orders'));
    }
}
