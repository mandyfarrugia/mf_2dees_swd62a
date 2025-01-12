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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Items</h2>
                                <div class="ml-auto" id="btn_placeholder">
                                    <a href="{{ route('items.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- Include the filter form -->
                            @include('items._filter')
                            @if ($items->count())
                                <div class="table-responsive"> <!-- Added table responsiveness -->
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Item</th>
                                                <th scope="col">Release Date</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $index => $item)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->release_date }}</td>
                                                    <td>&euro;{{ $item->price }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td width="150">
                                                        <div class="btn-group w-100" role="group">
                                                            <a href="{{ route('items.show', $item->id) }}"
                                                                class="btn btn-sm btn-circle btn-info d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Show">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="form.html"
                                                                class="btn btn-sm btn-circle btn-secondary d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-sm btn-circle btn-danger d-block d-md-inline-block mb-2 mb-md-0"
                                                                title="Delete" onclick="confirm('Are you sure?')">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- End of table-responsive -->
                            @else
                                <p style="text-align: center;"><i class="fa-solid fa-face-frown"></i></p>
                                <p style="text-align: center;">{{ $randomMessage }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
