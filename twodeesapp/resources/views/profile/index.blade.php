@extends('layouts.main')
@section('content')
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if(file_exists($user->profile_picture))
                                <a href="{{ asset($user->profile_picture) }}" data-fancybox data-caption="{{ $user->name }} {{ $user->surname }}">
                                    <img src="{{ asset($user->profile_picture) }}" class="rounded-circle shadow-4 img-fluid" style="width: 150px;" alt="{{ $user->username }}"/>
                                </a>
                            @else
                                <img src="https://images.nightcafe.studio//assets/profile.png?tr=w-1600,c-at_max" class="rounded-circle shadow-4 img-fluid" style="width: 150px;" alt="No profile picture available"/>
                            @endif
                            <h5 class="my-3">{{ $user->name }} {{ $user->surname }}</h5>
                            {{-- <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                            @if(Auth::check())
                                @if ($user->id == auth()->user()->id)
                                    @if(file_exists($user->profile_picture))
                                        <div class="d-flex justify-content-center mb-2">
                                            <a class="btn btn-success btn-sm"><i class="fa-solid fa-user-large"></i> Update profile picture</a>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a class="btn btn-success btn-sm ms-1"><i class="fa-solid fa-xmark"></i> Remove profile picture</a>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center mb-2">
                                            <a class="btn btn-success btn-sm"><i class="fa-solid fa-upload"></i> Upload profile picture</a>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-center mb-2">
                                        <a class="btn btn-primary"><i class="fas fa-user-edit"></i> Edit profile</a>
                                        <a class="btn btn-danger ms-1"><i class="fas fa-user-times"></i> Delete profile</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->username }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Location</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->location->name }}, {{ $country->name }}</p>
                                    <p class="text-muted mb-0"><small>{{ $region->name }}</small></p>
                                </div>
                            </div>
                            <hr>
                            @include('common._date_format')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ format_date($user->birth_date) }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Bio</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        @if($user->bio)
                                            {{ $user->bio }}
                                        @else
                                            <i><small>No bio available at the moment!</small></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if(Auth::check())
                                @if ($user->id == auth()->user()->id)
                                    <hr>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <p class="text-muted"><small>Please remember that it is your responsibility to ensure all the information on your profile is accurate and up to date. Should you notice any mistakes, feel free to make the necessary corrections.</small></p>
                                        </div>
                                    </div>        
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
