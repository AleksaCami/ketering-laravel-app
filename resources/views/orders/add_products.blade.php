@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <button class="btn btn-primary float-right sticky-top">Stavke proizvoda <span>(0)</span></button>
        </div>
    </div>
    <form action="/stavke/store" method="post">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Proizvod</th>
                        <th scope="col" width="120">Kolicina</th>
                        <th scope="col" width="120">Cena</th>
                        <th scope="col" width="200" class="text-right">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody id="bindProducts">

                    </tbody>
                </table>
            </div>
        </div>

    </form>

    <div id="proizvodi" class="row">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-md-4">
                    <figure class="card card-product p-4">
                        <div class="img-wrap m-4"><img src="/storage/products_images/{{$product->products_images}}" style="width: 100%;"></div>
                        <figcaption class="info-wrap">
                            <h4 class="title">{{$product->naziv}}</h4>
                            <p class="desc">{{$product->opis}}</p>
                        </figcaption>
                        <div class="bottom-wrap">
                            <button value="{{$product->id}}" id="dodaj_proizvod" class="btn btn-block btn-primary float-right">
                                Dodaj u porudžbenicu
                            </button>
                        </div> <!-- bottom-wrap.// -->
                    </figure>
                </div> <!-- col // -->
            @endforeach
        @else
            <h2>Nemate proizvoda</h2>
            <br>
            <a href="/products/create"><button class="btn btn-primary btn-block"></button></a>
        @endif

        </div> <!-- row.// -->
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">{{$products->links()}}</div>
            <div class="col-lg-4"></div>
        </div>
</div>

<script>
    $('#proizvodi').on('click', '#dodaj_proizvod', function() {

        let product_id = $(this).val();

        $.ajax({
            url: 'http://localhost:8000/api/product/' + product_id,
            type: 'GET',
            success: function(result) {
                console.log(result);
                $('#bindProducts').append(`
                    <tr>
                        <td>
                            <div class="img-wrap"><img src="/storage/products_images/${result.products_images}" class="img-thumbnail img-sm"></div>
                        </td>
                        <td>
                            <figure class="media">
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">${result.naziv}</h6>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <input class="form-control" type="number">
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">${result.cena} din.</var>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td class="text-right">
                            <a href="" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            }
        });
    });
</script>

@endsection
