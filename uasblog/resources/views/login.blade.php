@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            {{-- Content --}}
            <main class="col-md-9 ms-sm-2 col-lg-10 px-md-4">
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-4 offset-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h1>Login</h1>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="role">Login as</label>
                                        <select class="form-control" name="role" id="role">
                                          <option>User</option>
                                          <option>Admin</option>
                                        </select>
                                      </div>
                                    <div class="form-group">
                                        <label for="email">Email: </label><input class="form-control" type="text" name="email" id="email"><br>
                                        @error ('email')
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
                                        <div class="login-actions">
                                            <span class="login-checkbox">
                                                <input id="remember" name="remember" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" class="form-control">
                                                    <label class="choice" for="remember">Remember me</label>
                                            </span>
                                        </div>
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