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
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>Stavke</th>
                        <th>Event<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Klijent<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Rok izrade<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Napomena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Status</th>
                        <th>Izmeni</th>
                        <th>Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><input type="checkbox" name=""></td>
                            <td><a href="#"><button class="btn btn-primary btn-xs">Stavke</button></a></td>
                            <td>{{$order->event->naziv}}</td>
                            <td>{{$order->event->klijent->naziv}}</td>
                            <td>{{$order->rok_izrade}}</td>
                            <td>{{$order->napomena}}</td>
                            {{-- Ukoliko je status false, prikazace crveni iks, ukoliko je true zeleni checkmark --}}
                            @if($order->status == false)
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
