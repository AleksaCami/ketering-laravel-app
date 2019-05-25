<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magacin;
use App\Inventory;

class InventoryController extends Controller
{
    public function index(){
        $inventory = Inventory::all();
        return view('inventory.index')->with('inventory', $inventory);
    }

    public function create(){
        $magacini = Magacin::all();
        return view('inventory.create')->with('magacini', $magacini);
    }

    public function store(Request $request){
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'pocetno_stanje' => 'required',
            'magacin' => 'required'
        ]);

        $inventory = new Inventory;
        $inventory->naziv = $request->input('naziv');
        $inventory->mera = $request->input('mera');
        $inventory->cena = $request->input('cena');
        $inventory->pocetno_stanje = $request->input('pocetno_stanje');
        $inventory->magacin_id = $request->input('magacin');

        $inventory->save();

        return redirect('/inventory')->with('success', 'Uspesno dodat predmet u inventar');
    }
}
