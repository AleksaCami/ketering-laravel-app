@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-lg-9">
            <h2>Prikaz korisnika</h2>
        </div>
        <div class="col-lg-3 px-0">
            <a href="/register"><button class="btn btn-primary btn-block btn-xs">Dodaj korisnika</button></a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Ime i prezime<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Email<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Pozicija<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Nalog kreiran<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->tip_korisnika}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="korisnici/edit/{{$user->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                        <td><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
