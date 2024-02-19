<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Order;

class OrdersController extends Controller
{
    public function orders()
    {
        $orders = Order::all();
        return view('order.orders', compact('orders'));
    }

}
