@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-9">
                <h2>Event: {{$nazivEventa}}</h2>
                <h2>Klijent: {{$nazivKlijenta}}</h2>
            </div>
            <div class="col-lg-3 px-0">
                <a href="/orders/add_products/{{$order->id}}"><button type="button" class="btn btn-primary float-right">Dodaj stavku</button></a>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">Stavke narudzbenice</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection