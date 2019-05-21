@extends('layouts.home')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <table id="example" class="table table-striped table-bordered" style="width:100%">--}}
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <th><input type="checkbox" onclick="checkAll(this)"></th>--}}
{{--                        <th>Ime i prezime</th>--}}
{{--                        <th>Email</th>--}}
{{--                        <th>Rola</th>--}}
{{--                        <th>Sektor</th>--}}
{{--                        <th>Vreme dodavanja</th>--}}
{{--                        <th>Edit</th>--}}
{{--                        <th>Delete</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($users as $user)--}}
{{--                    <tr>--}}
{{--                        <td><input type="checkbox" name=""></td>--}}
{{--                        <td>{{$user->name}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

<div class="container">
    <div class="row">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th><input type="checkbox" onclick="checkAll(this)"></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tip_korisnika}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="#"><button class="btn btn-primary btn-xs">edit</button></a></td>
                    <td><button class="btn btn-danger btn-xs">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
