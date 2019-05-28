<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index')->with('orders', $orders);
    }

    public function create(){
        $products = Product::orderBy('created_at', 'desc')->paginate(9);
        return view('orders.create')->with('products', $products);
    }
}
