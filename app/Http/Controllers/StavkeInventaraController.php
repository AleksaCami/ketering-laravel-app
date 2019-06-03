<?php

namespace App\Http\Controllers;

use App\Event;
use App\Order;
use App\Stavka;
use Illuminate\Http\Request;

class StavkeInventaraController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);
        $events = Event::all();
        $stavke = Stavka::all();
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


}
