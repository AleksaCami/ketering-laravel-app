@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row sticky-top">
            <div class="col mb-4">
                <a href="#" class="btn btn-info btn-lg float-right">
                    <i class="fa fa-shopping-cart"></i><span> (0)</span>
                </a>
            </div>
        </div>

        <div class="row">
            @if(count($products) >= 0)
                @foreach($products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product p-4">
                            <div class="img-wrap m-4"><img src="/storage/products_images/{{$product->products_images}}" style="width: 100%; display: block; margin: auto;"></div>
                            <figcaption class="info-wrap">
                                <h4 class="title">{{$product->naziv}}</h4>
                                <p class="desc">{{$product->opis}}</p>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-block btn-primary float-right">Dodaj u korpu</a>
                            </div> <!-- bottom-wrap.// -->
                        </figure>
                    </div> <!-- col // -->
                @endforeach
            @else
                <h2>Nemate proizvoda</h2>
            @endif

        </div> <!-- row.// -->
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">{{$products->links()}}</div>
            <div class="col-lg-4"></div>
        </div>


    </div>

@endsection
