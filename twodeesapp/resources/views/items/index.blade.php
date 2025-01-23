@extends('layouts.main')

@section('content')
    @php
        /* An array of humoristic messages inspired by Discord, the Warhammer lore, and Gears of War.
         * A random number (taking into consideration the boundaries of the array) will be generated,
         * representing a randomly chosen message that will be displayed to explain that no items have been populated as of yet. */
        $emptyListMessages = [
            "Looks like this list is having a 'Do Not Disturb' moment. Try adding something!",
            "Well, this list is a ghost town. Maybe it's time to summon some content?",
            "The list is empty, like the Orks' understanding of strategy - nonexistent!",
            'This list is as empty as a Tyranid hive after a battle. Nothing left to devour!',
            'Alas, this list is as barren as the fields of Cadia after the 13th Black Crusade!',
            'This list is emptier than a Locust nest after a Hammer of Dawn strike.',
            "This list is as empty as a COG soldier's ammo after a firefight.",
            'The items in this list must have gone for a chainsaw duel—leaving nothing behind',
        ];

        $randomisedIndex = rand(0, count($emptyListMessages) - 1);
        $randomMessage = $emptyListMessages[$randomisedIndex];
    @endphp
    <main class="py-5">
        <div class="container">
            @include('common._message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">
                                    @if(request('category_id') == null)
                                        <span>All Items</span>
                                    @else
                                        @foreach($categories as $id => $name)
                                            @if($id == request('category_id'))
                                                <span>All {{ $name }}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </h2>
                                <div class="ml-auto" id="btn_placeholder">
                                    <a href="{{ route('items.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                    <a href="#" class="btn btn-secondary" id="view_mode"><i class="fa fa-{{ request('view_mode') == 'table' || request('view_mode') == null ? 'images' : (request('view_mode') == 'cards' ?  'table' : '')}}"></i></a>
                                </div>
                            </div>
                        </div>
                        <div>
                            @include('common._search')
                            <hr>
                            @include('items._filter')
                            <hr>
                        </div>
                        @if($items->count())
                            @include('common._date_format')
                            @if(request('view_mode') == 'table' || request('view_mode') == null)
                                @include('items._table')
                            @elseif(request('view_mode') == 'cards')
                                @include('items._cards')
                            @endif
                        @else
                            <div class="card-body">
                                <p style="text-align: center;"><i class="fa-solid fa-face-frown"></i></p>
                                <p style="text-align: center;">{{ $randomMessage }}</p>
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