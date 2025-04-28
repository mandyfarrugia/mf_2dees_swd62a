@extends('layouts.main')
@section('title', 'All users')
@section('content')
<div class="container mt-5">
  <div class="row g-4"> <!-- 'g-4' adds space between columns -->
    @foreach ($users as $user)
    <div class="col-md-4">
      <div class="card">
        @if(file_exists($user->profile_picture))
            <img src="{{ asset($user->profile_picture) }}" class="card-img-top" alt="Image 1">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $user->username }}</h5>
          <p class="card-text">Some quick example text to build on the card title.</p>
        </div>
      </div>
    </div>
    @endforeach
    
    <div class="col-md-4">
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 1">
        <div class="card-body">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">Some quick example text to build on the card title.</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 2">
        <div class="card-body">
          <h5 class="card-title">Card 2</h5>
          <p class="card-text">Another quick example text for card content.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 3">
        <div class="card-body">
          <h5 class="card-title">Card 3</h5>
          <p class="card-text">Some more example text for another card.</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection