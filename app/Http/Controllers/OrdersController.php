<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $orders = Order::all();
        return view('orders.index')->with('orders', $orders);
    }

    public function create(){
        $events = Event::all();
        return view('orders.create')->with('events', $events);
//        $products = Product::orderBy('created_at', 'desc')->paginate(9);
//        return view('orders.create')->with('products', $products);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'rok_izrade' => 'required',
            'napomena' => 'required',
            'status' => ''
        ]);

        $orders = new Order;
        $orders->event_id = $request->input('event_id');
        $orders->rok_izrade = $request->input('rok_izrade');
        $orders->napomena = $request->input('napomena');
        // Status je postavljen na false na pocetku, sve dok se porudzbina ne izvrsi
        $orders->status = false;

        $orders->save();

        return redirect('/orders')->with('success', 'Uspesno dodata porudzbenica');
    }
}
