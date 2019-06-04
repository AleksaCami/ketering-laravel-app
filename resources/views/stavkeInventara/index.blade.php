@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-9">
                <h1>Stavke inventara</h1>
                <h2>Event: {{$nazivEventa}}</h2>
                <h2>Klijent: {{$nazivKlijenta}}</h2>
            </div>
            @if(Auth::user()->tip_korisnika == 'kuhinja')
                <div class="col-lg-3 px-0">
                    <a href="/stavkeInventara/create/{{$order->id}}"><button type="button" class="btn btn-primary float-right">Dodaj stavku</button></a>
                </div>
            @endif
            @if(Auth::user()->tip_korisnika == 'magacin')
                <div class="col-lg-3 px-0">
                    <form action="/orders/magacin/finish/{{$order->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success float-right mb-1">Prihvati inventar</button>
                    </form>
{{--                    <a href="#"><button type="button" class="btn btn-primary float-right mb-1">Izmeni inventar</button></a>--}}
{{--                    <a href="#"><button type="button" class="btn btn-danger float-right">Odbi inventar</button></a>--}}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">Stavke inventara narudzbenice</th>
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Proizvod</th>
                        {{--                        <th scope="col">Kuhinja</th>--}}
                        <th scope="col">Cena</th>
                        <th scope="col">Kolicina</th>

                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventari as $inventar)
                        <tr>
                            <td>
                                <div class="img-wrap"><img src="/storage/inventory_images/{{$inventar->inventory_images}}" class="img-thumbnail img-sm"></div>
                            </td>
                            <td>{{$inventar->naziv}}</td>
                            {{--                            <td>Magacin</td>--}}
                            <td>{{$inventar->cena}}</td>
                            <td>{{$inventar->kolicina}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
