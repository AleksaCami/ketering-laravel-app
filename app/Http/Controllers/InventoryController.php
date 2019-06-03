<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magacin;
use App\Inventory;
use Illuminate\Support\Facades\Storage;

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
            'magacin' => 'required',
            'inventory_images' => 'image|nullable|max:1999',
            'izgubljen' => ''
        ]);

        if($request->hasFile('inventory_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('inventory_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju publi/product_images
            $path = $request->file('inventory_images')->storeAs('public/inventory_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $inventory = new Inventory;
        $inventory->naziv = $request->input('naziv');
        $inventory->mera = $request->input('mera');
        $inventory->cena = $request->input('cena');
        $inventory->pocetno_stanje = $request->input('pocetno_stanje');
        $inventory->magacin_id = $request->input('magacin');
        $inventory->izgubljen = false;
        $inventory->inventory_images = $fileNameToStore;

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
            'magacin' => 'required',
            'inventory_images' => 'image|nullable|max:1999'
        ]);

        $novo_stanje = $request->input('novo_stanje');

        if($novo_stanje < 0)
        {
            return redirect('/inventory/edit/' . $id)->with('error', "Ne mozete dodati negativnu kolicinu.");
        }

        if($request->hasFile('inventory_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('inventory_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju publi/inventory_images
            $path = $request->file('inventory_images')->storeAs('public/inventory_images', $fileNameToStore);
        }

        $inventory = Inventory::find($id);
        $inventory->naziv = $request->input('naziv');
        $inventory->mera = $request->input('mera');
        $inventory->cena = $request->input('cena');
        $inventory->pocetno_stanje += $novo_stanje;
        $inventory->magacin_id = $request->input('magacin');
        if($request->hasFile('inventory_images')) {
            $inventory->inventory_images = $fileNameToStore;
        }
        $inventory->izgubljen = false;

        $inventory->save();

        return redirect('/inventory')->with('success', 'Vase promene su uspesno sacuvane');
    }

    public function destroy($id)
    {
        $item = Inventory::find($id);

        if($item->inventory_images != 'noimage.png') {
            // Delete image
            Storage::delete('public/inventory_images/' . $item->inventory_images);
        }
        $item->delete();

        return redirect('/inventory')->with('success', 'Predmet uspesno obrisan iz inventara!');
    }

    public function getInventarById($id){
        $item = Inventory::find($id);

        return response()->json($item);
    }
}
