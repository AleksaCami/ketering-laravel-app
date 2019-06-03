@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <button id="stavkeInventara" class="btn btn-success col-12 rounded-0">Stavke inventara (<span id="brojInventara"> 0 </span>)</button>
            </div>
        </div>

        <form id="tabelaSaInventarom" style="display: none" class="mb-4" action="/orders/stavke/store" method="post">
            @csrf
            <div class="card border-top-0">
                <div class="table-responsive">
                    <table class="table table-hover shopping-cart-wrap mb-0">
                        <thead class="text-muted">
                        <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Proizvod</th>
                            <th scope="col">Magacin</th>
                            <th scope="col">Izgubljen</th>
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

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <input id="pretraga" class="form-control border border-primary mt-3" type="search" placeholder="Pretrazi inventar" aria-label="Search">
            </div>
        </div>

        <!-- row.// -->
        {{--        <div class="row">--}}
        {{--            <div class="col-lg-4"></div>--}}
        {{--            <div class="col-lg-4">{{$products->links()}}</div>--}}
        {{--            <div class="col-lg-4"></div>--}}
        {{--        </div>--}}
        <div class="row">
            <div class="col">
                <div class="card mt-3 tab-card">
{{--                    <div class="card-header tab-card-header">--}}
{{--                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Sav inventar</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <h5 class="card-title">Lista inventara</h5>
                            <div id="proizvodi" class="row mt-2">
                                @if(count($inventory) > 0)
                                    @foreach($inventory as $item)
                                        <div id="proizvod" class="col-md-4 col-lg-4 mt-3">
                                            <figure class="card card-product p-3 flex-fixed-width-item h-100">
                                                <div class="d-flex m-4"><img class="img-fluid" style="object-fit: cover; height: 35vh; width: auto" src="/storage/inventory_images/{{$item->inventory_images}}"></div>
                                                <figcaption class="info-wrap">
                                                    <h4 id="nazivProizvoda" class="title">{{$item->naziv}}</h4>
                                                    <p class="desc">Kolicina: {{$item->pocetno_stanje}}</p>
                                                    <p style="font-size: 20px; font-weight: bold; color: #007BFF">{{$item->cena}}<span> din.</span></p>
                                                </figcaption>
                                                <div class="bottom-wrap">
                                                    <button value="{{$item->id}}" id="dodaj_inventar" class="btn btn-block btn-primary float-right">
                                                        Dodaj inventar
                                                    </button>
                                                </div> <!-- bottom-wrap.// -->
                                            </figure>
                                        </div> <!-- col // -->
                                    @endforeach
                                @else
                                    <h2>Nemate inventar</h2>
                                    <br>
                                    <a href="/inventory/create"><button class="btn btn-primary btn-block">Dodaj inventar</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            let productsInCart = [];

            // Event na dugme za dodavanje proizvoda u korpu
            $('#proizvodi').on('click', '#dodaj_inventar', function() {

                let product_id = $(this).val();
                // console.log($(this).val());
                // pretvaram product_id u integer
                let id = parseInt(product_id);

                // url zbog preglednosti stavljamo u promenljivu
                let url = 'http://localhost:8000/api/inventory/' + id;

                // primer JavaScript async fetch metode koju cemo implementirati kasnije u pravu aplikaciju umesto ajax-a.
                // fetch(url)
                //     .then(response => {
                //         return response.json();
                //     })
                //     .then(myJson => {
                //         console.log(JSON.stringify(myJson));
                //     });

                $.ajax({
                    url: url,
                    type: 'GET',
                    // !!!!!!!!
                    dataType: "json",
                    success: function(result) {

                        // Sada je result objekat, u kome se nalazi response u JSON obliku sa kojim mozete da radite sta ocete
                        // console.log(result);

                        // Ako se u listi productInCard nalazi id proizvoda, ispisi
                        // alert poruku, u suprotom dodaj proizvod u tabelu.
                        if($.inArray(result, productsInCart) !== -1) {

                            alert('Proizvod je vec u korpi');

                        } else {

                            // console.log(result.id);

                            productsInCart.push(result.id);

                            // Problem je bio sto niste eksplicitno rekli Ajax-u da ocekujete JSON, cim sam to uradio sve je proradilo
                            // Ukoliko iz nekog razloga nece da vam radi, ocistite app cache i config cache
                            // console.log(result.responseJSON.id);

                            $('#bindProducts').append(`
                            <tr>
                                <td>
                                    <div class="img-wrap"><img src="/storage/inventory_images/${result.inventory_images}" class="img-thumbnail img-sm"></div>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.naziv}</h6>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.magacin_id}</h6>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="media pt-4">
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">${result.izgubljen}</h6>
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

                                    <a data-id="${result.id}" href="#" id="deleteProduct" class="btn btn-danger"> <i class="fas fa-trash"></i></a>

                            </tr>
                                </td>
                        `);
                            povecajUkupnuCenuSvihProizvoda();
                            povecajBrojProizvoda();
                        }
                    }
                }); // ajax

            }); // event dodaj_proizvod

            // Event za brisanje proizvoda
            $('body').on('click', '#deleteProduct', function(e) {
                e.preventDefault();

                // Obisi id iz liste productsInCart pa zatim obrisi ceo elemenat
                let index = productsInCart.indexOf($(this).data('id'));
                if (index > -1) {
                    productsInCart.splice(index, 1);
                }

                $(this).parents('tr').detach();

                povecajUkupnuCenuSvihProizvoda();
                povecajBrojProizvoda();
            });


            // Event za dodavanje kolicine na proizvod
            $('body').on('change', '.kolicina', function(e) {

                let kolicina = $(this).val();
                let row = $(this).parents('tr');
                let cena = $(row).find('#cena').text();
                let ukupnaCena = $(row).find('#ukupnaCena');


                // Promeni ukupnu cenu
                $(ukupnaCena).text(parseInt(cena) * parseInt(kolicina));

                povecajUkupnuCenuSvihProizvoda();
            });

            // Event za pretragu
            $("#pretraga").keyup(function() {

                let valueOfInput = $(this).val().toLowerCase();

                $("h4#nazivProizvoda").filter(function() {
                    let proizvod = $(this).parents('#proizvod');
                    let nazivProizvoda = $(this).text();

                    if(nazivProizvoda.toLowerCase().indexOf(valueOfInput)) {
                        console.log('Nema proizvoda');
                        $(proizvod).hide();
                    } else {
                        $(proizvod).show();
                    }

                });
            });

            // Event za prikaz tabele sa proizvodima
            $("#stavkeInventara").on('click', function () {
                $('#tabelaSaInventarom').slideToggle(200, 'linear');
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

            function povecajBrojProizvoda() {

                $('#brojInventara').text(productsInCart.length);

            }

        }); // Document ready

    </script>
@endsection
