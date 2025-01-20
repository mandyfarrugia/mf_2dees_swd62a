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
              <form action="{{ route('authentication.login_post') }}" method="POST">
                @csrf
                @include('authentication._login_form')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection