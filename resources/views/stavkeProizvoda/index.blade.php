@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-9">
                <h1>Stavke Proizvoda</h1>
                <h2>Event: {{$nazivEventa}}</h2>
                <h2>Klijent: {{$nazivKlijenta}}</h2>
            </div>
            @if(Auth::user()->tip_korisnika != 'kuhinja' && Auth::user()->tip_korisnika != 'magacin' && Auth::user()->tip_korisnika != 'vozac')
                <div class="col-lg-3 px-0">
                    <a href="/stavkeProizvoda/create/{{$order->id}}"><button type="button" class="btn btn-primary float-right">Dodaj stavku</button></a>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">Stavke narudzbenice</th>
                    </tr>
                    <tr>
                        <th scope="col">Proizvod</th>
{{--                        <th scope="col">Kuhinja</th>--}}
                        <th scope="col">Cena</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col">Slika</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->kolicina}}</td>
                            <td>{{$product->naziv}}</td>
{{--                            <td>Kuhinja</td>--}}
                            <td>{{$product->cena}}</td>
                            <td>
                                <div class="img-wrap"><img src="/storage/products_images/{{$product->products_images}}" class="img-thumbnail img-sm"></div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
