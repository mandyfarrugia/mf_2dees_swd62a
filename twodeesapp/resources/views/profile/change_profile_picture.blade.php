@extends('layouts.main')
@section('title', 'Update your profile picture')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Update profile picture</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.process_profile_picture_update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @include('profile._upload_form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection