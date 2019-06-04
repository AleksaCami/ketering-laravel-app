@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz inventara</h2>
            <br>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Jedinica mere<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Cena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Pocetno stanje<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Magacin<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col" style="width: 100px">Slika</th>
                        <th>Izmeni</th>
                        <th>Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventory as $item)
                        <tr>
                            <td>{{$item->naziv}}</td>
                            <td>{{$item->mera}}</td>
                            <td>{{$item->cena}}</td>
                            <td>{{$item->pocetno_stanje}}</td>
                            <td>{{$item->magacin->naziv}}</td>
                            <td><img class="img-fluid" style="height: auto" src="/storage/inventory_images/{{$item->inventory_images}}"></td>
                            <td><a href="/inventory/edit/{{$item->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/inventory/destroy/{{ $item->id }}">
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
