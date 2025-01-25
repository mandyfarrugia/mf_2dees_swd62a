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
              <form id="register_form" action="{{ route('authentication.register_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('authentication._register_form')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection