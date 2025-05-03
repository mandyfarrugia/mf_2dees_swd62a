@extends('layouts.main')
@section('title', 'About')
@section('content')
<section class="page-section about-heading">
    <div class="container">
        @include('common._date_format')
        @php
            $dateOfBirth = '2001-12-05';

            $galleryFolder = 'gallery';
            $images = array();

            $imageFolderPath = public_path($galleryFolder);
            $files = File::allFiles($imageFolderPath);

            foreach($files as $file) {
                array_push($images, $file->getRelativePathname());
            }

            $randomisedIndex = rand(0, count($images) - 1);
            $randomImage = $galleryFolder . '/' . $images[$randomisedIndex];
        @endphp
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset($randomImage) }}" alt="..." />
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Hello from Malta! 🇲🇹</span>
                            <span class="section-heading-lower">About TwoDees</span>
                        </h2>
                        @include('common._age_calculation')
                        <p id="about_paragraph">I am Mandy Farrugia, aged <?= calculate_age($dateOfBirth) ?> (born <?= format_date($dateOfBirth) ?>), massive foodie and music-head, and hailing from an island in the Mediterranean sea where the four seasons and privacy are a distant dream, and if you have not gotten the hint already, I have a penchant for Warhammer and gaming. When I am not reimaging assets and providing end-user support for a living or tinkering (pun-intended) with software development technologies, my notion of a personal heaven would be a comfortable gaming chair while enjoying Gears of War (Epic Games > The Coalition), Warhammer 40,000 Space Marine, Halo (Bungie Inc. > 343 Industries), Visage, Outlast, Red Dead Redemeption, and Dead Space... and last but not least, Turkish Döner kebab complemented by garlic &amp; yoghurt sauce and pita bread.</p>
                        <p id="about_paragraph">My programming journey commenced in November 2015 where I familiarised myself with programming lexicon using Java as part of the MATSEC O'Level programming coursework for the Computing unit, contributing to a Grade 1. This led me to further my studies at MCAST to pursue a career in software development, acquiring a Diploma in ICT <small>(MQF Level 3)</small> in 2019 and a Advanced Diploma in IT (Software Development) <small>(MQF Level 4)</small> in 2022. At the time of the development of this web application, I am following my second year of the Bachelor of Science (Honours) in Software Development.</p>
                        <p class="mb-0" id="about_paragraph">Since November 2022, I have been employed at the Ministry for the Economy, Enterprise and Strategic Projects (formerly Ministry for the Economy, European Funds and Lands) within the Information Management Unit. Duties include asset management (laptops and multifunction printers), end-user support, and website maintenance (namely Commerce Department, Malta Freeport, State Aid, NAB, RPC, and economy/ekonomija). Throughout the duration of the Stabbiltà scheme in 2024, I was responsible for the maintenance of its respective website.</p>
                        <p class="mt-3" id="about_paragraph">Since October 2021, I have provided free coding sessions related to object-oriented programming, C#, ASP.NET, web scraping using the Selenium library, PHP, Transact-SQL, and C as part of the annual European Code Week initiative.</p>
                        <h4>Testimony to above music-head statement</h4>
                        <ul>
                            @php
                                $artists = array('The Alan Parsons Project' => 'alive',
                                    'Amy Winehouse' => 'deceased',
                                    'Ofra Haza' => 'deceased',
                                    'Two Steps From Hell' => 'alive',
                                    'Nightwish' => 'alive',
                                    'Hozier' => 'alive',
                                    'U2' => 'alive',
                                    'David Byrne' => 'alive',
                                    'Talking Heads' => 'alive',
                                    'Phil Collins' => 'alive',
                                    'Genesis' => 'alive',
                                    'Sabaton' => 'alive',
                                    'Gloryhammer' => 'alive',
                                    'Colin Vearncombe/Black' => 'deceased',
                                    'Sky Ferreira' => 'alive'
                                );

                                ksort($artists); //Sort associative array by keys in ascending order.
                            @endphp

                            @foreach($artists as $artist => $status)
                                <li>
                                    {{ $artist }}
                                    @if($status === 'deceased')
                                        <i class="fa-solid fa-cross"></i>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection