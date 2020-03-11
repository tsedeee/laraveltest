@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($albums->images as $album)
            <div class="col-sm-4">
                <div class="item">

                    <img src="{{ asset('storage/'.$album->name) }}" class="img-thumbnail" style="width:300px; height:300px;">

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
