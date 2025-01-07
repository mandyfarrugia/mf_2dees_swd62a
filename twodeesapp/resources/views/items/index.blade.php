@extends('layouts.main')

@section('content')
    @php
      $emptyListMessages = array("Looks like this list is having a 'Do Not Disturb' moment. Try adding something!", 
        "Well, this list is a ghost town. Maybe it's time to summon some content?",
        "The list is empty, like the Orks' understanding of strategy - nonexistent!",
        "This list is as empty as a Tyranid hive after a battle. Nothing left to devour!",
        "Alas, this list is as barren as the fields of Cadia after the 13th Black Crusade!",
        "This list is emptier than a Locust nest after a Hammer of Dawn strike.",
        "This list is as empty as a COG soldier's ammo after a firefight.",
        "The items in this list must’ve gone for a chainsaw duel—leaving nothing behind");

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
                    <div class="ml-auto">
                      <a href="{{ route('items.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                @if($items->count())
                  @include('items._filter')
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $index => $item)
                          <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->release_date }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td width="150">
                              <a href="{{ route('items.show', $item->id) }}" class="btn btn-sm btn-circle btn-info" title="Show"><i class="fa fa-eye"></i></a>
                              <a href="form.html" class="btn btn-sm btn-circle btn-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                              <a href="#" class="btn btn-sm btn-circle btn-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                @else
                  <p>{{ $randomMessage }}</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection