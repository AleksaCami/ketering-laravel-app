@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-lg-9">
            <h2>Prikaz korisnika</h2>
        </div>
        <div class="col-lg-3 px-0">
            <a href="/register"><button class="btn btn-primary btn-block btn-xs">Dodaj korisnika</button></a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Ime i prezime<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Email<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Pozicija<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Nalog kreiran<i style="margin-left: 10px" class="fas fa-arrows-alt-v"></i></th>
                    <th>Izmeni</th>
                    <th>Obrisi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->tip_korisnika}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="/korisnici/edit/{{$user->id}}"><button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button></a></td>
                        <td>
{{--                            <button class="btn btn-danger btn-xs" id="deleteUser" data-id="{{$user->id}}"><i class="fas fa-trash"></i></button>--}}
                            <a href="" id="deleteUser" class="button" data-id="{{$user->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
{{--    <script src="sweetalert2.all.min.js"></script>--}}
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <script type="text/javascript">

        // const Swal = require('sweetalert2')

        $(document).on('click', '#deleteUser', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            console.log(id);
            let url = 'http://127.0.0.1:8000/korisnici/destroy/' + id;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if(result.value){
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {id:id},
                        success: function (data) {
                            console.log(data);
                        }
                    });

                   console.log(result.value);
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });

    </script>
</div>


@endsection
