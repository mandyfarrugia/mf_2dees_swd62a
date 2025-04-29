@extends('layouts.main')
@section('title', 'All users')
@section('content')
    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($users as $user)
                <div class="col-md-4 d-flex">
                    <div class="card border-0 shadow overflow-hidden rounded-3 w-100 d-flex flex-column">
                        <div class="position-relative">
                            @if(file_exists($user->profile_picture))
                                <img src="{{ asset($user->profile_picture) }}" class="card-img-top w-100" alt="Image 1">
                            @endif
                        </div>
                        <div class="card-body mt-auto">
                            <h5 class="card-title mb-1">{{ $user->username }}</h5>
                            <p class="card-text">Some quick example text to build on the card title.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection