@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj korisnika') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/korisnici/update/{{$korisnik->id}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Puno ime') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $korisnik->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $korisnik->email) }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tip_korisnika" class="col-md-4 col-form-label text-md-right">{{ __('Tip korisnika') }}</label>
                                <div class="col-md-6">
                                    <select name="tip_korisnika" class="form-control" id="exampleFormControlSelect1">
                                        @if($korisnik->tip_korisnika != 'admin')
                                            <option @if($korisnik->tip_korisnika == 'kuvar') selected="selected" @endif value="kuhinja">Kuvar</option>
                                            <option @if($korisnik->tip_korisnika == 'prodaja') selected="selected" @endif value="prodaja">Prodaja</option>
                                            <option @if($korisnik->tip_korisnika == 'vozac') selected="selected" @endif value="vozac">Vozac</option>
                                            <option @if($korisnik->tip_korisnika == 'magacin') selected="selected" @endif value="magacin">Magacioner</option>
                                        @else
                                            <option value="admin">Admin</option>
                                        @endif
                                    </select>
                                    @error('tip_korisnika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="reset_pass" id="reset_pass" {{ old('reset_pass') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="reset_pass">
                                            {{ __('Resetuj lozinku') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj korisnika') }}
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
