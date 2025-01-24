@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Upload profile picture</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
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
