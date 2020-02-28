@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Нийтлэлүүд</div>

                <div class="card-body">
                    posts
                    <a href="{{ action('PostController@index') }}">Нийтлэлүүд</a>
                    <img src="{{ asset('image.jpg') }}" alt="">
                    @foreach ($posts as $post)
                        <p> {{ $post->title }} || {{ $post->user->name }}</p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
