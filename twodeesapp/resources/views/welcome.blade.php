@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <section class="page-section clearfix">
        <div class="container">
            @include('common._message')
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded"
                    src="{{ asset('home/xbox-playstation-group-0057-64c3e751a896f.jpg') }}" alt="..." />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Crafted with love for gamers</span>
                        <span class="section-heading-lower">Powered by gamers</span>
                    </h2>
                    <p class="mb-3">Here, we believe that gaming is about fun and connection, not console wars. Whether
                        you are a fan of PlayStation, Xbox, Nintendo, or PC, every platform is welcome. The goal is simple -
                        explore new titles and celebrate your passion for play!</p>
                    <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl"
                            href="{{ route('items.index') }}">Explore more today!</a></div>
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
                            <span class="section-heading-upper">Calling all local gaming enthusiasts and businesses!
                                🇲🇹</span>
                            <span class="section-heading-lower">All for one</span>
                        </h2>
                        <p class="mb-0">Let's foster a sense of community among gamers and create unique and memorable
                            experiences that benefit everyone involved. This website is a testament to our eargerness to
                            contribute to the growth and success of our shared gaming culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="product-item-title d-flex">
                    <div class="bg-faded p-5 d-flex ms-auto rounded">
                        <h2 class="section-heading mb-0">
                            <span class="section-heading-upper">It's a good day to play. When everyone plays, we all
                                win.</span>
                            <span class="section-heading-lower">Microsoft Xbox <small>(2001)</small></span>
                        </h2>
                    </div>
                </div>
                <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0"
                    src="{{ asset('home/xbox_og.jpg') }}" alt="..." />
                <div class="product-item-description d-flex me-auto">
                    <div class="bg-faded p-5 rounded">
                        <p class="mb-0">Throwback to Microsoft's foray into the console gaming market, often associated
                            with the famous alien-like look and feel and the real-time procedurally generated startup on 64
                            megabytes worth of memory unit.</p>
                    </div>
                </div>
            </div>
            <div class="product-item mt-4">
                <div class="product-item-title d-flex">
                    <div class="bg-faded p-5 d-flex me-auto rounded">
                        <h2 class="section-heading mb-0">
                            <span class="section-heading-upper">The Legend Continues</span>
                            <span class="section-heading-lower">Sony PlayStation 2 <small>(2000)</small></span>
                        </h2>
                    </div>
                </div>
                <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0"
                    src="{{ asset('home/jjnNLgLZ7vij5VeRLsaTRi.jpg') }}" alt="Sony PlayStation 2" />
                <div class="product-item-description d-flex ms-auto">
                    <div class="bg-faded p-5 rounded">
                        <p class="mb-0">
                            Step into the world of the PlayStation 2, the best-selling console of all time. Known for its
                            iconic design, massive game library, and the unforgettable sound of the disc tray, it brought
                            families and friends together for countless adventures.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection