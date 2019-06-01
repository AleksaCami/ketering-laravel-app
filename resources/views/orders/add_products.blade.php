@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <button class="btn btn-primary float-right sticky-top">Stavke proizvoda <span>(0)</span></button>
        </div>
    </div>
    <form class="mb-4" action="/stavke/store" method="post">
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
            <button type="submit" class="btn btn-primary">Dodaj u porudžbenicu</button>
        </div>

    </form>

    <div id="proizvodi" class="row mt-5">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-md-4 col-lg-4 mt-3">
                    <figure class="card card-product p-3 flex-fixed-width-item h-100">
                        <div class="d-flex m-4"><img class="img-fluid" style="object-fit: cover; height: 35vh; width: auto" src="/storage/products_images/{{$product->products_images}}"></div>
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
            <a href="/products/create"><button class="btn btn-primary btn-block">Dodaj proizvod</button></a>
        @endif

        </div> <!-- row.// -->
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">{{$products->links()}}</div>
            <div class="col-lg-4"></div>
        </div>
</div>

<script>
    $(document).ready(function () {

        let productsInCart = [];

        $('#proizvodi').on('click', '#dodaj_proizvod', function() {

            let product_id = $(this).val();


            $.ajax({
                url: 'http://localhost:8000/api/product/' + product_id,
                type: 'GET',
                success: function(result) {

                    if($.inArray(result.id, productsInCart) !== -1) {

                        $('#cena').val( function(i, oldval) {
                            return parseInt( oldval, 10) + 1;
                        });

                    } else {

                        productsInCart.push(result.id);

                        $('#bindProducts').append(`
                            <tr>
                                <td>
                                    <div class="img-wrap"><img src="/storage/products_images/${result.products_images}" class="img-thumbnail img-sm"></div>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.naziv}</h6>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <input id="cena" style="width: 70px" class="form-control" type="number" name="kolicina" value="1">
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
                }
            });
        });
    });

</script>

@endsection
