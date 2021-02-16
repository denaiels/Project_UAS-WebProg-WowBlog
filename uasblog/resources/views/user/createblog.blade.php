@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            {{-- Content --}}
            <div class="card col-md-4 offset-md-5" style="margin-top:50px">
                <div class="card-header">
                    <h1>Create Blog</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="createblog" enctype="multipart/form-data">
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title: </label>
                            <input class="form-control" type="text" name="title" id="title"><br>                            
                        </div>
                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select class="form-control" name="category" id="category">
                                <option value="1">Beach</option>
                                <option value="2">Mountain</option>
                                <option value="3">Lake</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image: </label>
                            <input class="form-control" type="file" name="image" id="image"><br>
                        </div>
                        <div class="form-group">
                            <label for="description">Story: </label>
                            <input class="form-control" type="text" name="description" id="description"></textarea><br>
                        </div>
                        <input class="btn btn-outline-primary" type="submit" value="Create">
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection