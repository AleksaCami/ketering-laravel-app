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
                <table class="table table-hover shopping-cart-wrap mb-0">
                    <thead class="text-muted">
                        <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Proizvod</th>
                            <th scope="col" width="120">Cena</th>
                            <th scope="col" width="120">Kolicina</th>
                            <th scope="col" width="120">Ukupno</th>
                            <th scope="col" width="200" class="text-right">Obrisi</th>
                        </tr>
                    </thead>
                    <tbody id="bindProducts">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-center justify-content-center align-middle"><strong class="align-middle">Total: <span id="total">0</span></strong></td>
                            <td><button type="submit" class="btn btn-primary">Dodaj u porudžbenicu</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </form>
    
    <div class="row mb-4">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
            <input id="pretraga" class="form-control border border-primary" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>

    <div id="proizvodi" class="row mt-5">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-md-4 col-lg-4 mt-3">
                    <figure class="card card-product p-3 flex-fixed-width-item h-100">
                        <div class="d-flex m-4"><img class="img-fluid" style="object-fit: cover; height: 35vh; width: auto" src="/storage/products_images/{{$product->products_images}}"></div>
                        <figcaption class="info-wrap">
                            <h4 id="nazivProizvoda" class="title">{{$product->naziv}}</h4>
                            <p class="desc">{{$product->opis}}</p>
                        </figcaption>
                        <div class="bottom-wrap">
                            <button value="{{$product->id}}" id="dodaj_proizvod" class="btn btn-block btn-primary float-right">
                                Dodaj proizvod
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

                    // Ako se u listi productInCard nalazi id proizvoda, inkrementuj
                    // vrednost, u suprotom dodaj proizvod u tabelu.
                    if($.inArray(result.id, productsInCart) !== -1) {

                        alert('Proizvod je vec u korpi');


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
                                    <div class="price-wrap">
                                        <var id="cena${result.id}" class="price"><span id="cena">${result.cena}</span> din.</var>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td>
                                    <input id="kolicina${result.id}" style="width: 70px" class="kolicina form-control" type="number" name="kolicina" value="1">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var id="ukupno${result.id}" class="price"><span id="ukupnaCena">${result.cena}</span> din.</var>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">

                                    <a href="#" id="deleteProduct" class="btn btn-danger"> <i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        `);
                        povecajUkupnuCenuSvihProizvoda();
                    }
                }
            }); // ajax

            // Povecaj total

        }); // event dodaj_proizvod

        $('body').on('click', '#deleteProduct', function(e) {
            e.preventDefault();

            $(this).parents('tr').detach();

        });

        $('body').on('change', '.kolicina', function(e) {

            let kolicina = $(this).val();
            let row = $(this).parents('tr');
            let cena = $(row).find('#cena').text();
            let ukupnaCena = $(row).find('#ukupnaCena');


            // Promeni ukupnu cenu
            $(ukupnaCena).text(parseInt(cena) * parseInt(kolicina));

            povecajUkupnuCenuSvihProizvoda();
        });
        
        function povecajUkupnuCenuSvihProizvoda() {
            let kolicinaSvihProizvoda = $('#bindProducts tr').toArray();
            let ukupnaCenaSvihProizvoda = $('#total');

            let novaCenaSvihProizvoda = 0;
            let cenaProizvoda;

            $.each(kolicinaSvihProizvoda, function(i, val) {
                cenaProizvoda = $(val).find('#ukupnaCena').text()
                novaCenaSvihProizvoda += parseInt(cenaProizvoda);
            });


            $(ukupnaCenaSvihProizvoda).text(novaCenaSvihProizvoda);
        }
    });

    $("#pretraga").keyup(function() {

        let input = $(this).val();
        let regex = new RegExp("/\btest123/");

        let test = $("h4#nazivProizvoda").toArray();

        $.each(test, function(index, value){
            let proizvod = $(value).text();
            let provera = regex.test(input);

            if(provera)
            {
                alert("grrr");
            }
        })
    });

</script>

@endsection
