@extends('layouts.main')

@section('content')
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/about.jpg" alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">{{ $item->category->name }}</span>
                                <span class="section-heading-lower">{{ $item->name }}</span>
                            </h2>
                            <p>Released in</p>
                            <div class="button-spacing">
                                <button type="submit" class="btn btn-primary">Return to all items</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection