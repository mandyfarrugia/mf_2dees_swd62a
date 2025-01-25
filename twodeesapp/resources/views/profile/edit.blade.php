@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Join us today!</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('profile._edit_form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
