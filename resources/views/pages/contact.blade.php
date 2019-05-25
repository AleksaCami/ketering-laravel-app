@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Kontaktirajte nas</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Ukoliko imate tehnickih problema sa aplikacijom, mozete nas obavestiti putem kontakt forme.</p>

            <form method="POST" action="/contact/store">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-md-0 mb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name" class="">Ime</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email" class="">Email</label>
                                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <label for="message">Poruka</label>
                                    <textarea rows="4" cols="50" type="text" id="message" name="message" rows="2" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required></textarea>

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center text-md-left">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4 mt-4">
                                        <button type="submit" class="btn btn-primary p-3 center-block">
                                            {{ __('Posalji') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection

