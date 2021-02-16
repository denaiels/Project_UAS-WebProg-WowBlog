@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="fs-4">Admin Menu</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $usercur)
                    <tr>
                        <td>{{ $usercur->name }}</td>
                        <td>{{ $usercur->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection