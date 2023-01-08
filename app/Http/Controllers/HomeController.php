<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('home/index', compact('fields'));
    }

    public function about()
    {
        return view('home/about');
    }

    public function contact()
    {
        return view('home/contact');
    }

    public function detail($id)
    {
        $fields = Field::find($id);
        return view('home/detail', compact('fields'));
    }

    public function order()
    {
        $orders = Order::with(['field', 'user'])->where('users_id', auth()->user()->id)->get();
        return view('home/order', compact('orders'));
    }
}
