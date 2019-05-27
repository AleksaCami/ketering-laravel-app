@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Prikaz proizvoda</h2>
            <br>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>Naziv<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Jedinica mere<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Cena<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Opis<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Kategorija<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Slika</th>
                        <th>Izmeni<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                        <th>Obrisi<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><input type="checkbox" name=""></td>
                            <td>{{$product->naziv}}</td>
                            <td>{{$product->mera}}</td>
                            <td>{{$product->cena}}</td>
                            <td>{{$product->opis}}</td>
                            <td>{{$product->kuhinja->naziv}}</td>
                            <td><img class="img-responsive" style="width: 100%" src="/storage/products_images/{{$product->products_images}}"></td>
                            <td><a href="/products/edit/{{$product->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form method="POST" action="/products/destroy/{{$product->id}}">
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
