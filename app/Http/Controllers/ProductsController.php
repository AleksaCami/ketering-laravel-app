<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'kuhinja' => 'required',
            'products_images' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('products_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('products_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju publi/product_images
            $path = $request->file('products_images')->storeAs('public/products_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }



        $products = new Product;
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kuhinja_id = $request->input('kuhinja');
        $products->products_images = $fileNameToStore;

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
            'prodKuhinjaId' => $prodKuhinjaId,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'mera' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'kuhinja' => 'required',
            'products_images' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('products_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('products_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju publi/product_images
            $path = $request->file('products_images')->storeAs('public/products_images', $fileNameToStore);
        }

        $products = Product::find($id);
        $products->naziv = $request->input('naziv');
        $products->mera = $request->input('mera');
        $products->cena = $request->input('cena');
        $products->opis = $request->input('opis');
        $products->kuhinja_id = $request->input('kuhinja');
        if($request->hasFile('products_images')) {
            $products->products_images =  $fileNameToStore;
        }

        $products->save();

        return redirect('/products')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $products = Product::find($id);


        if($products->products_images != 'noimage.png') {
            // Delete image
            Storage::delete('public/products_images/' . $products->products_images);
        }
        $products->delete();

        return redirect('/products')->with('success', 'Proizvod uspesno obrisan!');
    }
}
