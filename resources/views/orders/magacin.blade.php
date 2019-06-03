@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz kompletiranih porudzbenica</h2>
            <br>

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Stavke</th>
                        <th>Event<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Klijent<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Rok izrade<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Napomena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        @if($order->status == true)
                            <tr>
                                <td><a href="/orders/show/{{$order->id}}"><button class="btn btn-primary btn-xs">Stavke</button></a></td>
                                <td>{{$order->event->naziv}}</td>
                                <td>{{$order->event->klijent->naziv}}</td>
                                <td>{{$order->rok_izrade}}</td>
                                <td>{{$order->napomena}}</td>
                                @if($order->status == true)
                                    <td><i style="font-size: 50px; color: green;" class="fas fa-check"></i></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection