<?php

namespace App\Http\Controllers;

use App\Event;
use App\Inventory;
use App\Magacin;
use App\Order;
use App\StavkaInventara;
use Illuminate\Http\Request;

class StavkeInventaraController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);
        $events = Event::all();
        $stavke = StavkaInventara::all();
        $nazivKlijenta = $order->event->klijent->naziv;
        $nazivEventa = $order->event->naziv;

        return view('stavkeInventara.index', [
            'order' => $order,
            'events' => $events,
            'nazivEventa' => $nazivEventa,
            'nazivKlijenta' => $nazivKlijenta,
            'stavke' => $stavke
        ]);
    }

    public function create($id)
    {
        // Paginacija jebe prilikom pretrazivanja proizvoda
        // Ne moze da pronadje proizvode koji se nalaze na drugoj strani
        //$products = Product::orderBy('naziv', 'desc')->paginate(9);
        $inventory = Inventory::all();
        $magacini = Magacin::all();
        $item = Inventory::find($id);
        $magacin = Magacin::find($id);

        //$productKuhinjaId = $product->kuhinja_id;
        //$kuhinjaId = $kuhinja->id;

        return view('stavkeInventara.create', [
            'inventory' => $inventory,
            'magacini' => $magacini,
            'item' => $item,
            'magacin' => $magacin
        ]);
    }
}
