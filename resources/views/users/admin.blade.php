@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Admin are logged in!
                </div>
            </div>
{{--            <div class="table-responsive">--}}
{{--                <table class="table table-striped">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">#</th>--}}
{{--                        <th scope="col">Ime i prezime</th>--}}
{{--                        <th scope="col">Email</th>--}}
{{--                        <th scope="col">Rola</th>--}}
{{--                        <th scope="col">Sektor</th>--}}
{{--                        <th scope="col">Vreme dodavanja</th>--}}
{{--                        <th scope="col">Edit</th>--}}
{{--                        <th scope="col">Delete</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody id="tbody_korisnici">--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
@endsection
