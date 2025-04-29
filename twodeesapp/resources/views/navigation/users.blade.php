@extends('layouts.main')
@section('title', 'All users')
@section('content')
    <main class="py-5">
        <div class="container">
            @include('common._message')
            @include('common._date_format')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">
                                    @if(request('category_id') == null)
                                        <span>All Items</span>
                                    @else
                                    @endif
                                </h2>
                                <div class="ml-auto" id="btn_placeholder">
                                    <a href="" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                    <a href="#" class="btn btn-secondary" id="view_mode"><i class="fa fa-{{ request('view_mode') == 'table' || request('view_mode') == null ? 'images' : (request('view_mode') == 'cards' ?  'table' : '')}}"></i></a>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                            <div class="card-body">
                                <div class="container mt-5">
                                    <div class="row g-4 mb-5">
                                        @foreach ($users as $user)
                                            <div class="col-md-4 d-flex">
                                                <div class="card border-0 shadow overflow-hidden rounded-3 w-100 d-flex flex-column">
                                                    <div class="position-relative">
                                                        @if(file_exists($user->profile_picture))
                                                            <img src="{{ asset($user->profile_picture) }}" class="card-img-top w-100" alt="Image 1">
                                                        @else
                                                            <img src="https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352156-stock-illustration-default-placeholder-profile-icon.jpg" class="card-img-top w-100" alt=""/>
                                                        @endif
                                                    </div>
                                                    <div class="card-body mt-auto text-center">
                                                        <h5 class="card-title mb-1">{{ $user->username }}</h5>
                                                        <p class="text-muted mb-0">{{ $user->location->name }}, {{ $user->location->region->country->name }}</p>
                                                        <p class="card-text">{{ $user->bio }}</p>
                                                        <p><small class="text-muted mb-0">Joined on {{ format_date($user->created_at) }}</small></p>
                                                        <div class="btn-group w-100" role="group">
                                                            <a href="{{ route('profile.index', $user->id) }}"
                                                                class="btn btn-sm btn-circle btn-primary d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Show">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-sm btn-circle btn-secondary d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn-delete btn btn-sm btn-circle btn-danger d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <p style="text-align: center;"><i class="fa-solid fa-face-frown"></i></p>
                            </div>
                        <form id="form_delete" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection