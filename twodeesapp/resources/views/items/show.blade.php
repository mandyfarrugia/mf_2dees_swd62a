@extends('layouts.main')

@section('content')
    @php
        $stringifiedReleaseDate = strtotime($item->release_date);
        $formattedReleaseDate = date('j F Y', $stringifiedReleaseDate);
    @endphp
    <section class="page-section about-heading">
        <div class="container">
            @if($message = session('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset($item->image_path) }}"
                alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">{{ $item->category->name }}</span>
                                <span class="section-heading-lower">{{ $item->name }}</span>
                            </h2>
                            @php
                                $price = $item->price;
                                $mainCurrency = intval(floor($price));
                                $fractionalCurrency = ($price * 100) % 100;
                            @endphp
                            <h4><span id="currency_sign">&euro;</span><span
                                    id="main_currency">{{ $mainCurrency }}</span>.<span
                                    id="fractional_currency">{{ str_pad($fractionalCurrency, 2, 0, STR_PAD_RIGHT) }}</span>
                            </h4>
                            <p><small id="release_date_sm">Released on {{ $formattedReleaseDate }}</small></p>
                            <p>{{ $item->description }}</p>
                            <div class="button-spacing">
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('items.index') }}" class="btn btn-primary">Return to all items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection