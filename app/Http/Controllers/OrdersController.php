<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index')->with('orders', $orders);
    }

    public function create(){
        $products = Product::all();
        return view('orders.create')->with('products', $products);
    }
}
