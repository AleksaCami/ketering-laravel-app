<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Kuhinja;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        $kuhinje = Kuhinja::all();
        return view('products.create')->with('kuhinje', $kuhinje);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'kuhinja' => 'required'
        ]);

        $products = new Product;
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kuhinja_id = $request->input('kuhinja');

        $products->save();

        return redirect('/products')->with('success', 'Uspesno dodat novi proizvod!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $kuhinje = Kuhinja::all();

        $prodKuhinjaId = $product->kuhinja->id;

        return view('products.edit', [
            'kuhinje' => $kuhinje,
            'product' => $product,
            'prodKuhinjaId' => $prodKuhinjaId
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'kuhinja' => 'required'
        ]);

        $products = Product::find($id);
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kuhinja_id = $request->input('kuhinja');

        $products->save();

        return redirect('/products')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect('/products')->with('success', 'Proizvod uspesno obrisan!');
    }
}
