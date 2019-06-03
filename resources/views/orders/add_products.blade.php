@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <button id="stavkeProizvoda" class="btn btn-success col-12 rounded-0">Stavke proizvoda (<span id="brojProizvoda"> 0 </span>)</button>
        </div>
    </div>

    <form id="tabelaSaProizvodima" style="display: none" class="mb-4" action="/orders/stavke/store" method="post">
        @csrf
        <div class="card border-top-0">
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

    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
            <input id="pretraga" class="form-control border border-primary mt-3" type="search" placeholder="Pretrazi proizvod" aria-label="Search">
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
                <div class="card-header tab-card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Sve kuhinje</a>
                        </li>

                        @foreach($kuhinje as $kuhinja)
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">{{$kuhinja->naziv}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <h5 class="card-title">Svi proizvodi</h5>
                            <div id="proizvodi" class="row mt-2">
                                @if(count($products) > 0)
                                    @foreach($products as $product)
                                        <div id="proizvod" class="col-md-4 col-lg-4 mt-3">
                                            <figure class="card card-product p-3 flex-fixed-width-item h-100">
                                                <div class="d-flex m-4"><img class="img-fluid" style="object-fit: cover; height: 35vh; width: auto" src="/storage/products_images/{{$product->products_images}}"></div>
                                                <figcaption class="info-wrap">
                                                    <h4 id="nazivProizvoda" class="title">{{$product->naziv}}</h4>
                                                    <p class="desc">{{$product->opis}}</p>
                                                    <p style="font-size: 20px; font-weight: bold; color: #007BFF">{{$product->cena}}<span> din.</span></p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
