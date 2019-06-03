@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dodaj novi predmet u inventar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/inventory/store" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv predmeta') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv') }}" required autocomplete="naziv" autofocus>

                                    @error('naziv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mera" class="col-md-4 col-form-label text-md-right">{{ __('Jedinica mere') }}</label>

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
                                    <input id="cena" type="number" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ old('cena') }}" required autocomplete="cena">
                                    @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pocetno_stanje" class="col-md-4 col-form-label text-md-right">{{ __('Kolicina') }}</label>

                                <div class="col-md-6">
                                    <input id="pocetno_stanje" type="number" class="form-control @error('pocetno_stanje') is-invalid @enderror" name="pocetno_stanje" value="{{ old('pocetno_stanje') }}" required autocomplete="pocetno_stanje">
                                    @error('pocetno_stanje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="magacin" class="col-md-4 col-form-label text-md-right">{{ __('Magacin') }}</label>

                                <div class="col-md-6">
                                    <select name="magacin" class="form-control" id="exampleFormControlSelect1">
                                        <option selected="selected" value="null">- Izaberite magacin -</option>
                                        @foreach($magacini as $magacin)
                                            <option value="{{ $magacin->id }}">{{ $magacin->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('magacin')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slika" class="col-md-4 col-form-label text-md-right">{{ __('Dodaj sliku') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="inventory_images">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj predmet') }}
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
