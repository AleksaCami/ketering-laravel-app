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
            <div class="col-md-4">
                <figure class="card card-product p-4">
                    <div class="img-wrap m-4"><img src="/storage/img/catering_logo.png" style="width: 100%; display: block; margin: auto;"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-block btn-primary float-right">Dodaj u korpu</a>
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product p-4">
                    <div class="img-wrap m-4"><img src="/storage/img/catering_logo.png" style="width: 100%; display: block; margin: auto;"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-block btn-primary float-right">Dodaj u korpu</a>
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product p-4">
                    <div class="img-wrap m-4"><img src="/storage/img/catering_logo.png" style="width: 100%; display: block; margin: auto;"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-block btn-primary float-right">Dodaj u korpu</a>
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
        </div> <!-- row.// -->



    </div>

@endsection
