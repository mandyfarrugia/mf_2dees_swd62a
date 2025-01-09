@extends('layouts.main')

@section('content')
<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('assets/img/thousand_sons.jpg') }}" alt="..." />
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Hello from Malta! 🇲🇹</span>
                            <span class="section-heading-lower">About TwoDees</span>
                        </h2>
                        <p>I am Mandy Farrugia, aged 23 and hailing from an island in the Mediterranean sea where the four seasons and privacy are a distant dream, and if you have not gotten the hint already, I have a penchant for Warhammer and gaming.</p>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection