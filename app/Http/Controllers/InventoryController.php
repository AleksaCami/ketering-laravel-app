<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magacin;
use App\Inventory;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function edit($id)
    {
        $item = Inventory::find($id);
        $magacini = Magacin::all();
        $inventoryMagacinId = $item->magacin->id;
        $mera = $item->mera;

        return view('/inventory.edit', [
            'item' => $item,
            'magacini' => $magacini,
            'inventoryMagacinId' => $inventoryMagacinId,
            'mera' => $mera
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'pocetno_stanje' => '',
            'magacin' => 'required'
        ]);

        $novo_stanje = $request->input('novo_stanje');

        if($novo_stanje < 0)
        {
            return redirect('/inventory/edit/' . $id)->with('error', "Ne mozete dodati negativnu kolicinu.");
        }

        $inventory = Inventory::find($id);
        $inventory->naziv = $request->input('naziv');
        $inventory->mera = $request->input('mera');
        $inventory->cena = $request->input('cena');
        $inventory->pocetno_stanje += $novo_stanje;
        $inventory->magacin_id = $request->input('magacin');

        $inventory->save();

        return redirect('/inventory')->with('success', 'Vase promene su uspesno sacuvane');
    }

    public function destroy($id)
    {
        $item = Inventory::find($id);
        $item->delete();

        return redirect('/inventory')->with('success', 'Predmet uspesno obrisan iz inventara!');
    }
}
