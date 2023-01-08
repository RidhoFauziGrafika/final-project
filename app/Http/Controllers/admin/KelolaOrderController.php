<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class KelolaOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['field', 'user'])->get();
        return view('admin/order/index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('admin/kelola-order')->with('success', 'Order Successfully Deleted');
    }
}
