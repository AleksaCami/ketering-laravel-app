<?php

namespace App\Http\Controllers;

use App\Magacin;
use Illuminate\Http\Request;

class MagacinController extends Controller
{

    public function index()
    {
        $magacini = Magacin::all();
        return view('magacini.index')->with('magacini', $magacini);
    }

    public function create()
    {
        // Dodaj novog klijenta
        return view('magacini.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'opis' => 'required'
        ]);


        $magacini = new Magacin;
        $magacini->naziv = $request->input('naziv');
        $magacini->opis = $request->input('opis');

        $magacini->save();

        return redirect('/magacini')->with('success', 'Uspesno dodat novi magacin!');
    }

    public function edit($id)
    {
        $magacini = Magacin::find($id);

        return view('magacini.edit')->with('magacin', $magacini);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'opis' => 'required'
        ]);

        $magacini = Magacin::find($id);
        $magacini->naziv = $request->input('naziv');
        $magacini->opis = $request->input('opis');

        $magacini->save();

        return redirect('/magacini')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $magacini = Magacin::find($id);
        $magacini->delete();

        return redirect('/magacini')->with('success', 'Magacin uspesno obrisan!');
    }
}
