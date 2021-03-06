@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj proizvodi') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/products/update/{{$product->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv proizvoda') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv', $product->naziv) }}" required autocomplete="naziv" autofocus>

                                    @error('naziv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mera" class="col-md-4 col-form-label text-md-right">{{ __('Mera') }}</label>

                                <div class="col-md-6">
                                    <select name="mera" class="form-control" id="mera">
                                        <option value="komad">Komad</option>
                                        <option value="litar">Litar</option>
                                        <option value="kg">Kg</option>
                                    </select>
                                    @error('mera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cena" class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>

                                <div class="col-md-6">
                                    <input id="cena" type="number" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ old('cena', $product->cena) }}" required autocomplete="cena">

                                    @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kuhinja" class="col-md-4 col-form-label text-md-right">{{ __('Kategorija') }}</label>

                                <div class="col-md-6">

                                    <select name="kuhinja" class="form-control" id="exampleFormControlSelect1">
                                        <option selected="selected" value="null">- Izaberite kuhinju -</option>
                                        @foreach($kuhinje as $kuhinja)
                                            <option @if($prodKuhinjaId == $kuhinja->id) selected="selected" @endif value="{{ $kuhinja->id }}">{{ $kuhinja->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('kuhinja')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opis" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                                <div class="col-md-6">
                                    <textarea id="opis" type="text" class="form-control @error('opis') is-invalid @enderror" name="opis" required autocomplete="opis">{{ old('opis', $product->opis) }}</textarea>

                                    @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slika" class="col-md-4 col-form-label text-md-right">{{ __('Dodaj sliku') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="products_images">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edituj proizvod') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
