<?php

namespace App\Http\Controllers;

use App\Klijent;
use Illuminate\Http\Request;

class KlijentiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $klijenti = Klijent::all();
        return view('klijenti.index')->with('klijenti', $klijenti);
    }

    public function create()
    {
        // Dodaj novog klijenta
        return view('klijenti.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'adresa' => 'required',
            'broj_telefona' => 'required|numeric',
            'email' => 'required|email',
            'kontakt_osoba' => 'required',
        ]);

        $klijent = new Klijent;
        $klijent->naziv = $request->input('naziv');
        $klijent->adresa = $request->input('adresa');
        $klijent->broj_telefona = $request->input('broj_telefona');
        $klijent->email = $request->input('email');
        $klijent->kontakt_osoba = $request->input('kontakt_osoba');

        $klijent->save();

        return redirect('/klijenti')->with('success', 'Uspesno dodat novi klijent!');
    }

    public function edit($id)
    {
        $klijent = Klijent::find($id);

        return view('klijenti.edit')->with('klijent', $klijent);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'adresa' => 'required',
            'broj_telefona' => 'required|numeric',
            'email' => 'required|email',
            'kontakt_osoba' => 'required',
        ]);

        $klijent = Klijent::find($id);
        $klijent->naziv = $request->input('naziv');
        $klijent->adresa = $request->input('adresa');
        $klijent->broj_telefona = $request->input('broj_telefona');
        $klijent->email = $request->input('email');
        $klijent->kontakt_osoba = $request->input('kontakt_osoba');

        $klijent->save();

        return redirect('/klijenti')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $klijent = Klijent::find($id);
        $klijent->delete();

        return redirect('/klijenti')->with('success', 'Klijent uspesno obrisan!');
    }
}
