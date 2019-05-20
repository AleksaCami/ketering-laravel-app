@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Kontaktirajte nas</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Ukoliko imate tehnickih problema sa aplikacijom, mozete nas obavestiti putem kontakt forme.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Ime</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Predmet poruke</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Poruka</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-center">
                        <a class="btn btn-primary p-3" onclick="document.getElementById('contact-form').submit();" style="color: white;"><b>Posalji</b></a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8 mt-3">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Kontakt</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        You are logged in!--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection

