<?php

namespace App\Http\Controllers;

use App\Event;
use App\Kuhinja;
use App\Order;
use App\Product;
use App\StavkaProizvoda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StavkeProizvodaController extends Controller
{
    public function index($id)
    {

        $products = DB::table('stavkeproizvoda')
            ->join('products', 'stavkeproizvoda.product_id', '=', 'products.id')
            ->join('orders', 'stavkeproizvoda.order_id', '=', 'orders.id')
            ->select('products.*', 'stavkeproizvoda.kolicina')
            ->where('stavkeproizvoda.order_id', $id)
            ->get();

        $order = Order::find($id);
        $events = Event::all();
        $stavke = StavkaProizvoda::all();
        $nazivKlijenta = $order->event->klijent->naziv;
        $nazivEventa = $order->event->naziv;

        return view('stavkeProizvoda.index', [
            'products' => $products,
            'order' => $order,
            'events' => $events,
            'nazivEventa' => $nazivEventa,
            'nazivKlijenta' => $nazivKlijenta,
            'stavke' => $stavke
        ]);
    }

    public function store(Request $request, $id)
    {

        $stavkeProizovda = new StavkaProizvoda;
        $stavkeProizovda->order_id = (int)$request->order_id;
        $stavkeProizovda->product_id = (int)$request->product_id;
        $stavkeProizovda->kolicina = (int)$request->kolicina;
        $stavkeProizovda->save();

        return response()->json($request);
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
            'kuhinja' => $kuhinja,
            'order_id' => $id
        ]);
    }
}
