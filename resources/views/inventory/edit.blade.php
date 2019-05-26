@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj predmet u inventaru') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/inventory/update/{{ $item->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv predmeta') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv', $item->naziv) }}" required autocomplete="naziv" autofocus>

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
                                        <option @if($mera == "komad") selected="selected" @endif value="komad">Komad</option>
                                        <option @if($mera == "litar") selected="selected" @endif value="litar">Litar</option>
                                        <option @if($mera == "kg") selected="selected" @endif value="kg">Kg</option>
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
                                    <input id="cena" type="number" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ old('cena', $item->cena) }}" required autocomplete="cena">
                                    @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pocetno_stanje" class="col-md-4 col-form-label text-md-right">{{ __('Trenutna kolicina') }}</label>

                                <div class="col-md-6">
                                    <input id="pocetno_stanje" type="number" class="form-control @error('pocetno_stanje') is-invalid @enderror" name="pocetno_stanje" value="{{ old('pocetno_stanje', $item->pocetno_stanje) }}" disabled required autocomplete="pocetno_stanje">
                                    @error('pocetno_stanje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="novo_stanje" class="col-md-4 col-form-label text-md-left">{{ __('Dodaj kolicinu') }}</label>

                                <div class="col-md-6">
                                    <input id="novo_stanje" type="number" class="form-control @error('pocetno_stanje') is-invalid @enderror" name="novo_stanje" autocomplete="pocetno_stanje">
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
                                        <option value="">- Izaberite magacin -</option>
                                        @foreach($magacini as $magacin)
                                            <option @if($inventoryMagacinId == $magacin->id) selected="selected" @endif value="{{ $magacin->id }}">{{ $magacin->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('magacin')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sacuvaj promene') }}
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
