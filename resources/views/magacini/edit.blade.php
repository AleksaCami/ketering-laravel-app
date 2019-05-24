@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj magacin') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/magacini/update/{{$magacin->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv magacina') }}</label>

                                <div class="col-md-6">
                                    <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv', $magacin->naziv) }}" required autocomplete="naziv" autofocus>

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
                                    <textarea id="opis" type="text" class="form-control @error('opis') is-invalid @enderror" name="opis" required autocomplete="opis">{{ old('opis', $magacin->opis) }}</textarea>

                                    @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edituj magacin') }}
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
