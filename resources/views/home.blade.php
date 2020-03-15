@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <p>{{ Auth::user()->name }}</p>
                {{--<p>{{ Auth::user()->profile->address }}</p>--}}

                <div class="card-body">
                <a href="{{ route('album.index') }}">Зургийн цомог</a>
                    {{--@foreach ($users as $user)
                        <p> {{ $user->id }} </p>
                        <p> {{ $user->name }} </p>
                        <p> {{ $user->email }} </p>
                    @endforeach

                    {{ $users->links() }}
                    <form action="{{route('jobs.store')}}" method="POST">
                        @csrf
                        <input type="text" name="title" class="form-control">
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </form>

                    @foreach ($all_users as $all_user)
                        <p> {{ $all_user->name }} || {{ $all_user->profile['address'] }}</p>
                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
