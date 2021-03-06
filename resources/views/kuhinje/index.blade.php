@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-9">
                <h2>Prikaz kuhinja</h2>
            </div>
            <div class="col-lg-3 px-0">
                <a href="/kuhinje/create"><button class="btn btn-primary btn-block btn-xs">Dodaj kuhinju</button></a>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Opis<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Magacin<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Izmeni</th>
                        <th>Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kuhinje as $kuhinja)
                        <tr>
                            <td>{{$kuhinja->naziv}}</td>
                            <td>{{$kuhinja->opis}}</td>
                            <td>{{$kuhinja->magacin->naziv}}</td>
                            <td><a href="/kuhinje/edit/{{ $kuhinja->id }}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/kuhinje/destroy/{{ $kuhinja->id }}">
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
