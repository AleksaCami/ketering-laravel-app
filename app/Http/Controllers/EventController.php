<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
//        $this->middleware('role:admin');
//        $this->middleware('role:prodaja');
    }

    public function index()
    {
        $eventi = Event::all();
        return view('eventi.index')->with('eventi', $eventi);
    }

    public function create()
    {
        // Dodaj novog klijenta
        return view('eventi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'datum_pocetka' => 'required',
            'vreme_pocetka' => 'required',
            'datum_zavrsetka' => 'required',
            'vreme_zavrsetka' => 'required',
            'klijent' => 'required',
        ]);

        $eventi = new Event;
        $eventi->naziv = $request->input('naziv');
        $eventi->datum_pocetka = $request->input('datum_pocetka');
        $eventi->vreme_pocetka = $request->input('vreme_pocetka');
        $eventi->datum_zavrsetka = $request->input('datum_zavrsetka');
        $eventi->vreme_zavrsetka = $request->input('vreme_zavrsetka');
        $eventi->klijent = $request->input('klijent');

        $eventi->save();

        return redirect('/eventi')->with('success', 'Uspesno dodat novi event');

    }
}
