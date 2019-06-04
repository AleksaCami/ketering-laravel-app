<?php

namespace App\Http\Controllers;

use App\Event;
use App\Inventory;
use App\Magacin;
use App\Order;
use App\StavkaInventara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StavkeInventaraController extends Controller
{
    public function index($id)
    {
        $inventari = DB::table('stavke_inventara')
            ->join('inventory', 'stavke_inventara.inventar_id', '=', 'inventory.id')
            ->join('orders', 'stavke_inventara.order_id', '=', 'orders.id')
            ->select('inventory.*', 'stavke_inventara.kolicina')
            ->where('stavke_inventara.order_id', $id)
            ->get();

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
            'stavke' => $stavke,
            'inventari' => $inventari,
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
            'magacin' => $magacin,
            'order_id' => $id,
        ]);
    }

    public function store(Request $request, $id)
    {

        $stavkeInventara = new StavkaInventara();
        $stavkeInventara->order_id = (int)$request->order_id;
        $stavkeInventara->inventar_id = (int)$request->inventar_id;
        $stavkeInventara->kolicina = (int)$request->kolicina;
        $stavkeInventara->save();

        return response()->json($request);
    }
}
