@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz porudzbenica</h2>
            <br>

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 150px">Stavke</th>
                        <th scope="col">Event<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 140px">Klijent<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 155px">Rok izrade<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Napomena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Status kuhinja</th>
                        <th scope="col">Status magacin</th>
                        <th scope="col">Status vozac</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <a href="/stavkeProizvoda/{{$order->id}}"><button class="btn btn-info btn-xs mb-3">Stavke proizvoda</button></a>
                                <a href="/stavkeInventara/{{$order->id}}"><button class="btn btn-warning btn-xs">Stavke inventara</button></a>
                            </td>
                            <td>{{$order->event->naziv}}</td>
                            <td>{{$order->event->klijent->naziv}}</td>
                            <td>{{$order->rok_izrade}}</td>
                            <td>{{$order->napomena}}</td>
                            {{-- Ukoliko je status false, prikazace crveni iks, ukoliko je true zeleni checkmark --}}
                            @if($order->statusKuhinja == false)
                                <td><i style="font-size: 50px; color: red;" class="fas fa-times"></i></td>
                            @else
                                <td><i style="font-size: 50px; color: green;" class="fas fa-check"></i></td>
                            @endif

                            @if($order->statusMagacin == false)
                                <td><i style="font-size: 50px; color: red;" class="fas fa-times"></i></td>
                            @else
                                <td><i style="font-size: 50px; color: green;" class="fas fa-check"></i></td>
                            @endif

                            @if($order->statusVozac == false)
                                <td><i style="font-size: 50px; color: red;" class="fas fa-times"></i></td>
                            @else
                                <td><i style="font-size: 50px; color: green;" class="fas fa-check"></i></td>
                            @endif
                            <td><a href="/orders/edit/{{$order->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/orders/destroy/{{$order->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
