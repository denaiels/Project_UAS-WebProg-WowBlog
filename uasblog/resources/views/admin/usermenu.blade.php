@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="fs-4">User Menu</h1>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $usercur)
                    <tr>
                        <td>{{ $usercur->name }}</td>
                        <td>{{ $usercur->email }}</td>
                        <td><a class="btn btn-danger" href="{{'/delete/'.$usercur->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection