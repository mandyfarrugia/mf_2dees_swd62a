@extends('layouts.main')
@section('content')
<main class="py-5">
    <div class="container">
        @include('common._message')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">All Categories</h2>
                            <div class="ml-auto" id="btn_placeholder">
                                <a href="{{ route('categories.create') }}" class="btn btn-success"><i
                                        class="fa fa-plus-circle"></i> Add New</a>
                                <a href="" class="btn btn-secondary" id="view_mode"><i class="fa fa-{{ request('view_mode') == 'table' || request('view_mode') == null ? 'images' : (request('view_mode') == 'cards' ?  'table' : '')}}"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        @include('common._search')
                        <hr>
                    </div>
                    @if($categories->count())
                        @if(request('view_mode') == 'table' || request('view_mode') == null)
                            @include('categories._table')
                        @elseif(request('view_mode') == 'cards')
                            @include('categories._cards')
                        @endif
                    @else
                        <div class="card-body">
                            <p style="text-align: center;"><i class="fa-solid fa-face-frown"></i></p>
                            <p style="text-align: center;"></p>
                        </div>
                    @endif
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