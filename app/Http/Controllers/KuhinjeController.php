<?php

namespace App\Http\Controllers;

use App\Kuhinja;
use App\Magacin;
use Illuminate\Http\Request;

class KuhinjeController extends Controller
{
    public function index()
    {
        $kuhinje = Kuhinja::all();
        return view('kuhinje.index')->with('kuhinje', $kuhinje);
    }

    public function create()
    {
        $magacini = Magacin::all();
        return view('kuhinje.create')->with('magacini', $magacini);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'opis' => 'required',
            'magacin' => 'required'
        ]);


        $kuhinje = new Kuhinja;
        $kuhinje->naziv = $request->input('naziv');
        $kuhinje->opis = $request->input('opis');
        $kuhinje->magacin_id = $request->input('magacin');

        $kuhinje->save();

        return redirect('/kuhinje')->with('success', 'Uspesno dodata nova kuhinja!');
    }


}
