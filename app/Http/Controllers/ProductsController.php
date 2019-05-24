<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        // Dodaj novog klijenta
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'kategorija' => 'required'
        ]);

        $products = new Product;
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kategorija = $request->input('kategorija');

        $products->save();

        return redirect('/products')->with('success', 'Uspesno dodat novi proizvod!');
    }

    public function edit($id)
    {
        $products = Product::find($id);

        return view('products.edit')->with('product', $products);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'kategorija' => 'required'
        ]);

        $products = Product::find($id);
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kategorija = $request->input('kategorija');

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
