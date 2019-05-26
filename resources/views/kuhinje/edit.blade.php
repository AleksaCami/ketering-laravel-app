@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj kuhinju') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/kuhinje/update/{{ $kuhinja->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="naziv" class="col-md-4 col-form-label text-md-right">{{ __('Naziv kuhinje') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv', $kuhinja->naziv) }}" required autocomplete="naziv" autofocus>

                                    @error('naziv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opis" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                                <div class="col-md-6">
                                    <textarea id="opis" type="text" class="form-control @error('opis') is-invalid @enderror" name="opis" value="{{ old('opis') }}" required autocomplete="adresa">{{ $kuhinja->opis }}</textarea>
                                    @error('opis')
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
                                            <option @if($kuhinjaMagacinId == $magacin->id) selected="selected" @endif value="{{ $magacin->id }}">{{ $magacin->naziv }}</option>
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
