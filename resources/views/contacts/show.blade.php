@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Contact
                    <span class="float-right">
                        <a href="{{ route('contact.index') }}">Contact List</a>
                    </span>
                </div>
                    <div class="card-body">
                        <p>Name /Нэр/: {{ $contact->name }}</p>
                        <p>Address /Гэрийн хаяг/: {{ $contact->address }}</p>
                        <p>Phone /Утасны дугаар/: {{ $contact->phone }}</p>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
