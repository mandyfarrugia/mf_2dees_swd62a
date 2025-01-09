@extends('layouts.main')

@section('content')
    @php
        $stringifiedReleaseDate = strtotime($item->release_date);
        $formattedReleaseDate = date('j F Y', $stringifiedReleaseDate);
    @endphp
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('assets/img/about.jpg') }}" alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">{{ $item->category->name }}</span>
                                <span class="section-heading-lower">{{ $item->name }}</span>
                            </h2>
                            <p><small id="release_date_sm">Released on {{ $formattedReleaseDate }}</small></p>
                            <div class="button-spacing">
                                <a href="{{ route('items.index') }}" class="btn btn-primary">Return to all items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection