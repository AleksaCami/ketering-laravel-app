@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz prihvacenih porudzbenica</h2>
            <br>

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Potvrdi</th>
                        <th>Storniraj</th>
                        <th>Stavke</th>
                        <th>Event<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Klijent<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Rok izrade<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Napomena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        @if($order->prihvacena == true)
                            @if($order->statusKuhinja == false)
                            <tr>
                                <td>
                                    <form method="post" action="/orders/finish/{{$order->id}}">
                                        <input type="hidden" name="status" value="{{$order->id}}">
                                        <button class="btn btn-primary btn-xs" type="submit">Zavrsi narudzbinu</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="/orders/storniraj/{{$order->id}}">
                                        <input type="hidden" name="status" value="{{$order->id}}">
                                        <button class="btn btn-danger btn-xs" type="submit">Storniraj</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/stavkeProizvoda/{{$order->id}}"><button class="btn btn-info btn-xs mb-3">Stavke proizvoda</button></a>
                                    <a href="/stavkeInventara/{{$order->id}}"><button class="btn btn-warning btn-xs">Stavke inventara</button></a>
                                </td>
                                <td>{{$order->event->naziv}}</td>
                                <td>{{$order->event->klijent->naziv}}</td>
                                <td>{{$order->rok_izrade}}</td>
                                <td>{{$order->napomena}}</td>
                            </tr>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
