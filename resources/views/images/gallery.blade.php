@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $albums->name }}({{ $albums->images->count() }} - зураг байна.)</h1>
    <div class="row">
        @foreach ($albums->images as $album)
            <div class="col-sm-4">
                <div class="item">

                    <img src="{{ asset('storage/'.$album->name) }}" class="img-thumbnail" style="width:300px">

                    <form action="{{ route('album.destroy', [$album->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Зургийг устгах</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
