<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrdersController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::with('Product')->get();;
        return view('admin.orders.index', $data);
    }
}
