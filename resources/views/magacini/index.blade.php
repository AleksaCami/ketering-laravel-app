@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz magacina</h2>
            <br>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Opis<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Izmeni</th>
                        <th>Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($magacini as $magacin)
                        <tr>
                            <td>{{$magacin->naziv}}</td>
                            <td>{{$magacin->opis}}</td>
                            <td><a href="/magacini/edit/{{$magacin->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/magacini/destroy/{{$magacin->id}}">
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
