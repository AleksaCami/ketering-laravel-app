@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <h2>Prikaz klijenata</h2>
        <br>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                    <th>Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Adresa<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Broj telefona<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>E-mail<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Kontakt osoba<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Izmeni<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Obrisi<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($klijenti as $klijent)
                    <tr>
                        <td><input type="checkbox" name=""></td>
                        <td>{{$klijent->naziv}}</td>
                        <td>{{$klijent->adresa}}</td>
                        <td>{{$klijent->broj_telefona}}</td>
                        <td>{{$klijent->email}}</td>
                        <td>{{$klijent->kontakt_osoba}}</td>
                        <td><a href="#"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                        <td><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection