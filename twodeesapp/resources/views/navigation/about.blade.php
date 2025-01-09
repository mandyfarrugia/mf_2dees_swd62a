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
                        <p>I am Mandy Farrugia, aged <?= intval(date('Y', time() - strtotime('2001-12-05'))) - 1970 ?> (born 5 December 2001), massive foodie and music-head (Alan Parsons Project, Amy Winehouse <i class="fa-solid fa-cross"></i>, Ofra Haza <i class="fa-solid fa-cross"></i>, Two Steps From Hell, Nightwish, Hozier, U2, David Byrne, Talking Heads, Phil Collins, Genesis, Sabaton, Gloryhammer, and Colin Vearncombe/Black <i class="fa-solid fa-cross"></i>), and hailing from an island in the Mediterranean sea where the four seasons and privacy are a distant dream, and if you have not gotten the hint already, I have a penchant for Warhammer and gaming. When I am not reimaging assets and providing end-user support for a living or tinkering (pun-intended) with software development technologies, my notion of a personal heaven would be a comfortable gaming chair while enjoying Gears of War, Warhammer 40,000 Space Marine, Halo (Bungie Inc. > 343 Industries), Visage, Outlast, Red Dead Redemeption, and Dead Space... and last but not least, Turkish Döner kebab complemented by garlic &amp; yoghurt sauce and pita bread.</p>
                        <p class="mb-0"></p>
                        <p>My programming journey commenced in November 2015 where I familiarised myself with programming lexicon using Java as part of the MATSEC O'Level programming coursework for the Computing unit, contributing to a Grade 1. This led me to further my studies at MCAST to pursue a career in software development, acquiring a Diploma in ICT <small>(MQF Level 3)</small> in 2019 and a Advanced Diploma in IT (Software Development) <small>(MQF Level 4)</small> in 2022. At the time of the development of this web application, I am following my second year of the Bachelor of Science (Honours) in Software Development.</p>
                        <p class="mb-0">Since November 2022, I have been employed at the Ministry for the Economy, Enterprise and Strategic Projects (formerly Ministry for the Economy, European Funds and Lands) within the Information Management Unit. Duties include asset management (laptop and multifunction printers), end-user support, and website maintenance (namely Commerce Department, Malta Freeport, State Aid, NAB, RPC, and economy/ekonomija). Throughout the duration of the Stabbiltà scheme in 2024, I was responsible for the maintenance of its respective website.</p>
                        <p class="mt-3">Since October 2021, I have provided free coding sessions related to object-oriented programming, C#, ASP.NET, web scraping using the Selenium library, PHP, Transact-SQL, and C as part of the annual European Code Week initiative.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection