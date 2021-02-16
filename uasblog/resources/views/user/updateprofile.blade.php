@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            {{-- Content --}}
            <div class="card col-md-4 offset-md-5" style="margin-top:50px">
                <div class="card-header">
                    <h1>Update Profile</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="updateprofile">
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}"><br>
                            @error ('name')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address: </label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}"><br>
                            @error ('email')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Phone: </label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}"><br>
                            @error ('phone')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="btn btn-outline-primary" type="submit" value="Update">
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection