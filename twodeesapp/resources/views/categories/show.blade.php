@extends('layouts.main')
@section('content')
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ ($category->image_path != null) ? asset($category->image_path) : '' }}"
            alt="{{ $category->name }}" />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">{{ $category->name }}</span>
                            </h2>
                            <div class="button-spacing">
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary">Return to all items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection