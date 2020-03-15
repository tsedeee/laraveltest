@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('Message'))
        <div class="alert alert-success">{{ Session::get('Message') }}</div>
    @endif
    <h2>Зургийн цомог</h2>
    @if (Auth::check() && Auth::user()->user_type == 'admin')
        <a href="{{ route('album.create') }}">Зургийн цомог үүсгэх</a>
    @endif
    <div class="row">
        @foreach ($albums as $album)
            <div class="col-sm-4">
                <div class="item">
                    <a href="/album/{{ $album->id }}">
                        @if (@empty($album->image))
                            <img src="{{ asset('images/f1.jpg') }}" class="img-thumbnail">
                        @else
                             <img src="{{ asset('storage/'.$album->image) }}" class="img-thumbnail">
                        @endif
                            <a href="/album/{{ $album->id }}" class="centered">{{ $album->name }}</a>
                    </a>
                </div>
                @if (Auth::check() && Auth::user()->user_type == 'admin')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $album->id }}">
                    Зургийн цомгийн зураг - {{ $album->id }}
                </button>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Зургийн цомгийн зураг өөрчлөх</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <form action="{{ route('album.add.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="file" name="image" class="form-control">
                                <input type="hidden" name="id" value="{{ $album->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Цуцлах</button>
                                <button type="submit" class="btn btn-primary">Цомгийн зураг хадгалах</button>
                            </div>
                        </form>
                        </div>
                    </div>
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
