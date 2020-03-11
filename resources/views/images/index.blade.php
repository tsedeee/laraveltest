@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($albums as $album)
            <div class="col-sm-4">
                <div class="item">
                    <a href="/album/{{ $album->id }}">
                        <img src="{{ asset('images/f1.jpg') }}" class="img-thumbnail">
                        <a href="/album/{{ $album->id }}" class="centered">{{ $album->name }}</a>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .item{
        left: 0;
        top: 0;
        position: relative;
        margin-top: 50px;
    }
    .item img{
        -webkit-transition: 0.6s ease;
        transition: 0.6s ease;

    }
    .item img:hover{
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }
    .centered{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 24px;
    }
</style>
