@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <h2>Prikaz korisnika</h2>
        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th><input type="checkbox" onclick="checkAll(this)"></th>
                <th>Ime i prezime<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                <th>Email<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                <th>Pozicija<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                <th>Nalog kreiran<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                <th>Izmeni<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                <th>Obrisi<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tip_korisnika}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="#"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                    <td><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
