@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj event') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/eventi/update/{{$event->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="klijent" class="col-md-4 col-form-label text-md-right">{{ __('Klijent') }}</label>

                                <div class="col-md-6">
                                    {{--                                <input id="tip_korisnika" type="text" class="form-control @error('tip_korisnika') is-invalid @enderror" name="tip_korisnika" value="{{ old('tip_korisnika') }}" required autocomplete="tip_korisnika">--}}
                                    <select name="klijent" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">- Izaberite klijenta -</option>
                                        @foreach($klijenti as $klijent)
                                            <option @if($eventovKlijentId == $klijent->id) selected="selected" @endif value="{{ $klijent->id }}">{{ $klijent->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('klijent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv eventa') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv', $event->naziv) }}" required autocomplete="naziv" autofocus>

                                    @error('naziv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datum_pocetka" class="col-md-4 col-form-label text-md-right">{{ __('Datum pocetka') }}</label>

                                <div class="col-md-6">
                                    <input id="datum_pocetka" type="date" class="form-control @error('datum_pocetka') is-invalid @enderror" name="datum_pocetka" value="{{ old('datum_pocetka', $event->datum_pocetka) }}" required autocomplete="datum_pocetka">

                                    @error('datum_pocetka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vreme_pocetka" class="col-md-4 col-form-label text-md-right">{{ __('Vreme pocetka') }}</label>

                                <div class="col-md-6">
                                    <input id="vreme_pocetka" type="time" class="form-control @error('vreme_pocetka') is-invalid @enderror" name="vreme_pocetka" value="{{ old('vreme_pocetka', $event->vreme_pocetka) }}" required autocomplete="vreme_pocetka">

                                    @error('vreme_pocetka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datum_zavrsetka" class="col-md-4 col-form-label text-md-right">{{ __('Datum zavrsetka') }}</label>

                                <div class="col-md-6">
                                    <input id="datum_zavrsetka" type="date" class="form-control @error('datum_zavrsetka') is-invalid @enderror" name="datum_zavrsetka" value="{{ old('datum_zavrsetka', $event->datum_zavrsetka) }}" required autocomplete="datum_zavrsetka">

                                    @error('datum_zavrsetka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vreme_zavrsetka" class="col-md-4 col-form-label text-md-right">{{ __('Vreme zavrsetka') }}</label>

                                <div class="col-md-6">
                                    <input id="vreme_zavrsetka" type="time" class="form-control @error('vreme_zavrsetka') is-invalid @enderror" name="vreme_zavrsetka" value="{{ old('vreme_zavrsetka', $event->vreme_zavrsetka) }}" required autocomplete="vreme_zavrsetka">

                                    @error('vreme_zavrsetka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edituj event') }}
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
