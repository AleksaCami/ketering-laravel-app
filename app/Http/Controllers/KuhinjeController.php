<?php

namespace App\Http\Controllers;

use App\Kuhinja;
use App\Magacin;
use Illuminate\Http\Request;

class KuhinjeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function edit($id)
    {
        $kuhinja = Kuhinja::find($id);
        $magacini = Magacin::all();
        $kuhinjaMagacinId = $kuhinja->magacin->id;

        return view('kuhinje.edit', [
            'kuhinja' => $kuhinja,
            'magacini' => $magacini,
            'kuhinjaMagacinId' => $kuhinjaMagacinId
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'opis' => 'required',
            'magacin' => 'required'
        ]);

        $kuhinje = Kuhinja::find($id);
        $kuhinje->naziv = $request->input('naziv');
        $kuhinje->opis = $request->input('opis');
        $kuhinje->magacin_id = $request->input('magacin');

        $kuhinje->save();

        return redirect('/kuhinje')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $kuhinja = Kuhinja::find($id);
        $kuhinja->delete();

        return redirect('/kuhinje')->with('success', 'Kuhinja uspesno obrisana!');
    }
}
