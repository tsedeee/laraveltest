@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="card">
                <div class="card-header">Contact edit</div>
                <form action="{{ route('contact.update', [$contact->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Нэр</label>
                            <input type="text" name="name" class="form-control" value="{{ $contact->name }}">
                        </div>
                        <div class="form-group">
                            <label>Гэрийн хаяг</label>
                            <input type="text" name="address" class="form-control"  value="{{ $contact->address }}">
                        </div>
                        <div class="form-group">
                            <label>Утас</label>
                            <input type="text" name="phone" class="form-control"  value="{{ $contact->phone }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Засах
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
