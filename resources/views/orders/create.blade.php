@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dodaj novu porudzbenicu') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/orders/store">
                            @csrf

                            <div class="form-group row">
                                <label for="event_id" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                                <div class="col-md-6">
                                    <select name="event_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected="selected" value="null">- Izaberite event -</option>
                                        @foreach($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('event_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rok_izrade" class="col-md-4 col-form-label text-md-right">{{ __('Rok izrade') }}</label>

                                <div class="col-md-6">
                                    <input id="rok_izrade" type="datetime-local" class="form-control @error('rok_izrade') is-invalid @enderror" name="rok_izrade" value="{{ old('rok_izrade') }}" required autocomplete="rok_izrade">

                                    @error('rok_izrade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="napomena" class="col-md-4 col-form-label text-md-right">{{ __('Napomena') }}</label>

                                <div class="col-md-6">
                                    <input id="napomena" type="text" class="form-control @error('napomena') is-invalid @enderror" name="napomena" value="{{ old('napomena') }}" required autocomplete="napomena">
                                    @error('napomena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Potvrdi') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--        <div class="row">--}}
{{--            @if(count($products) > 0)--}}
{{--                @foreach($products as $product)--}}
{{--                    <div class="col-md-4">--}}
{{--                        <figure class="card card-product p-4">--}}
{{--                            <div class="img-wrap m-4"><img src="/storage/products_images/{{$product->products_images}}" style="width: 100%; display: block; margin: auto;"></div>--}}
{{--                            <figcaption class="info-wrap">--}}
{{--                                <h4 class="title">{{$product->naziv}}</h4>--}}
{{--                                <p class="desc">{{$product->opis}}</p>--}}
{{--                            </figcaption>--}}
{{--                            <div class="bottom-wrap">--}}
{{--                                <a href="" class="btn btn-block btn-primary float-right">--}}
{{--                                    <i class="fa fa-shopping-cart"></i> Dodaj u korpu--}}
{{--                                </a>--}}
{{--                            </div> <!-- bottom-wrap.// -->--}}
{{--                        </figure>--}}
{{--                    </div> <!-- col // -->--}}
{{--                @endforeach--}}
{{--            @else--}}
{{--                <h2>Nemate proizvoda</h2>--}}
{{--            @endif--}}

{{--        </div> <!-- row.// -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4"></div>--}}
{{--            <div class="col-lg-4">{{$products->links()}}</div>--}}
{{--            <div class="col-lg-4"></div>--}}
{{--        </div>--}}
{{--

@endsection
