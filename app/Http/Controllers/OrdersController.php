<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Event;
use App\Stavka;
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
        return view('orders.index', [
            'orders' => $orders
        ]);
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
            'status' => '',
            'prihvacena' => ''
        ]);

        $orders = new Order;
        $orders->event_id = $request->input('event_id');
        $orders->rok_izrade = $request->input('rok_izrade');
        $orders->napomena = $request->input('napomena');
        // Status je postavljen na false na pocetku, sve dok se porudzbina ne izvrsi
        $orders->status = false;
        // Porudzbenica nije prihvacena po kreaciji
        $orders->prihvacena = false;

        $orders->save();

        return redirect('/orders')->with('success', 'Uspesno dodata porudzbenica');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $events = Event::all();
        $orderEventId = $order->event_id;

        return view('orders.edit', [
            'order' => $order,
            'events' => $events,
            'orderEventId' => $orderEventId
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'rok_izrade' => 'required',
            'napomena' => 'required',
            'status' => ''
        ]);

        $orders = Order::find($id);
        $orders->event_id = $request->input('event_id');
        $orders->rok_izrade = $request->input('rok_izrade');
        $orders->napomena = $request->input('napomena');
        // Status je postavljen na false na pocetku, sve dok se porudzbina ne izvrsi
        $orders->status = false;

        $orders->save();

        return redirect('/orders')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/orders')->with('success', 'Porudzbenica uspesno obrisana!');
    }

    public function add_products($id)
    {

        // Paginacija jebe prilikom pretrazivanja proizvoda
        // Ne moze da pronadje proizvode koji se nalaze na drugoj strani
        //$products = Product::orderBy('naziv', 'desc')->paginate(9);
        $products = Product::all();


        return view('orders.add_products')->with('products', $products);
    }

    public function show($id)
    {
        $order = Order::find($id);
        $events = Event::all();
        $stavke = Stavka::all();
        $nazivKlijenta = $order->event->klijent->naziv;
        $nazivEventa = $order->event->naziv;

        return view('orders.show', [
            'order' => $order,
            'events' => $events,
            'nazivEventa' => $nazivEventa,
            'nazivKlijenta' => $nazivKlijenta,
            'stavke' => $stavke
        ]);
    }

    public function store_stavka(Request $request){
        $this->validate($request, [
            'order_id' => 'required',
            'product_id' => 'required',
            'kolicina' => 'required'
        ]);

        // Nacin kako da dodamo u bazu proizvode iz korpe
        // posto nemamo name na poljima nigde??
        $stavke = new Stavka;
       // $stavke->order_id = $request->
       // $stavke->product_id;
       // $stavke->kolicina;

        $stavke->save();

        return redirect('/orders')->with('success', 'Uspesno dodate stavke');
    }

    public function kuhinja_pregled(){
        $orders = Order::all();
        return view('orders.kuhinja', [
            'orders' => $orders
        ]);
    }

    public function accept_order($id){

        $order = Order::find($id);
        $order->prihvacena = 1;
        $order->update();

        return redirect('/orders/kuhinja')->with('success', 'Uspesno prihvacena porudzbenica');
    }

    public function kuhinja_prihvacene(){
        $orders = Order::all();
        return view('orders.prihvacene', [
            'orders' => $orders
        ]);
    }
}

