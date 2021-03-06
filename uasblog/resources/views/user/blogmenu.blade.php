@extends('layouts.master')

@section('content')
    <div class="container">
        
        <a class="btn btn-success mt-5 mb-5" href="/createblog">Create Blog</a>

        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td><a class="btn btn-danger" href="{{'/delete/'.$article->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection