<?php

namespace App\Http\Controllers;

use App\Event;
use App\Kuhinja;
use App\Order;
use App\Product;
use App\Stavka;
use Illuminate\Http\Request;

class StavkeProizvodaController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);
        $events = Event::all();
        $stavke = Stavka::all();
        $nazivKlijenta = $order->event->klijent->naziv;
        $nazivEventa = $order->event->naziv;

        return view('stavkeProizvoda.index', [
            'order' => $order,
            'events' => $events,
            'nazivEventa' => $nazivEventa,
            'nazivKlijenta' => $nazivKlijenta,
            'stavke' => $stavke
        ]);
    }

    public function store(Request $request){
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

    public function create($id)
    {
        // Paginacija jebe prilikom pretrazivanja proizvoda
        // Ne moze da pronadje proizvode koji se nalaze na drugoj strani
        //$products = Product::orderBy('naziv', 'desc')->paginate(9);
        $products = Product::all();
        $kuhinje = Kuhinja::all();
        $product = Product::find($id);
        $kuhinja = Kuhinja::find($id);

        //$productKuhinjaId = $product->kuhinja_id;
        //$kuhinjaId = $kuhinja->id;

        return view('stavkeProizvoda.create', [
            'products' => $products,
            'kuhinje' => $kuhinje,
            'product' => $product,
            'kuhinja' => $kuhinja
        ]);
    }
}
