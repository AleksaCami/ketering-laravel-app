@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz svih eventa</h2>
            <br>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 180px">Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 220px">Datum pocetka<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 220px">Vreme pocetka<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 220px">Datum zavrsetka<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 220px">Vreme zavrsetka<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Klijent<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventi as $event)
                        <tr>
                            <td>{{$event->naziv}}</td>
                            <td>{{$event->datum_pocetka}}</td>
                            <td>{{$event->vreme_pocetka}}</td>
                            <td>{{$event->datum_zavrsetka}}</td>
                            <td>{{$event->vreme_zavrsetka}}</td>
                            <td>{{$event->klijent->naziv}}</td>
                            <td><a href="/eventi/edit/{{$event->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/eventi/destroy/{{$event->id}}">
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
