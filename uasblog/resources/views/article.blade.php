@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div style="width: 100%;" class="card-img-top mx-auto">
                    <img class="card-img-top" src="{{ asset('assets/'.$article->image) }}" alt="gambar wisata">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="card-body" style="height: 50%">
                    <div class="card-text" style="font-weight: bold; font-size: 30px">{{$article->title}}</div>
                    <br>
                    <div class="card-text">{{$article->description}}</div>
                </div>
                @if ($user->role == 'admin')
                <a href="{{'/product/update/'.$product->id}}">Update Product</a>
                @endif
                @if ($user->role == 'user')
                    <a href="{{'/cart/add/'.$product->id}}">Add to Cart</a>
                @endif
            </div>
        </div>
    </div>
@endsection