@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Album</div>
                <div class="card-body">
                    <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="album" class="form-control" placeholder="Зургийн цомгийн нэрийг оруулна уу?">
                        <br>

                        <input type="file" name="image[]" class="form-control">
                        <input type="file" name="image[]" class="form-control">
                        <input type="file" name="image[]" class="form-control">
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </form>
                    <br>
                    <br>
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/'.$image->name) }}" class="img-thumbnail">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
