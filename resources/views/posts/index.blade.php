@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Нийтлэлүүд</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <p> {{ $post->title }} || {{ $post->user->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
