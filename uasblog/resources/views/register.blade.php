@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            {{-- Content --}}
            <main class="col-md-9 ms-sm-2 col-lg-10 px-md-4">
                <div class="row">
                    <div class="col-md-4 offset-md-5" style="margin-top:50px">
                        <div class="card">
                            <div class="card-header">
                                <h1>Register</h1>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="register">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name">Name: </label><input class="form-control" type="text" name="name" id="name"><br>
                                        @error ('name')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address: </label><input class="form-control" type="text" name="email" id="email"><br>
                                        @error ('email')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone: </label><input class="form-control" type="text" name="phone" id="phone"><br>
                                        @error ('phone')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password: </label><input class="form-control" type="password" name="password" id="password"><br>
                                        @error ('password')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password: </label><input class="form-control" type="password" name="password_confirmation" id="password_confirmation"><br> 
                                    </div>
                                    <input type="submit" value="submit">
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>              
            </main>
        </div>
    </div>
@endsection