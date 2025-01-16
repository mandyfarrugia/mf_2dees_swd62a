@extends('layouts.main')

@section('content')
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('home/xbox-playstation-group-0057-64c3e751a896f.jpg') }}" alt="..." />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Crafted with love for gamers</span>
                        <span class="section-heading-lower">Powered by gamers</span>
                    </h2>
                    <p class="mb-3">Here, we believe that gaming is about fun and connection, not console wars. Whether you are a fan of PlayStation, Xbox, Nintendo, or PC, every platform is welcome. The goal is simple - explore new titles and celebrate your passion for play!</p>
                    <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="{{ route('items.index') }}">Explore more today!</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Calling all local gaming enthusiasts and businesses! 🇲🇹</span>
                            <span class="section-heading-lower">All for one</span>
                        </h2>
                        <p class="mb-0">Let's foster a sense of community among gamers and create unique and memorable experiences that benefit everyone involved. This website is a testament to our eargerness to contribute to the growth and success of our shared gaming culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection