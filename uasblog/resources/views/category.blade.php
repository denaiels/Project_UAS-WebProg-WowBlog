@extends('layouts.master')

@section('content')
    <div class="container " style="display: block; margin-top: 50px; margin-bottom: 50px">
        <div class="text-light" style="background-color: floralwhite;">
            <h2 class="text-center" style="color: black">Category:</h2>
            <h4 class="text-center" style="color: black">{{ $category->name }}</h4>

        </div>
        <div class="row mb-3">
            @foreach ($articles as $article)
                <div class="card col-4 text-center border-0">
                    <div style="width: 200px;height: 200px" class="card-img-top mx-auto">
                        <img class="card-img-top" src="{{ asset('assets/'.$article->image) }}" alt="gambar">
                    </div>
                    <div class="card-body">
                        <a class="card-text" href="{{'/article/'.$article->id}}"> {{$article->title}} </a>
                        <div class="card-text">Rp. {{$article->description}}</div>
                    </div>
                </div>
            @endforeach
        
        </div>
    
    </div>
@endsection