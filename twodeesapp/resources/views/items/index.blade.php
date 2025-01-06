@extends('layouts.main')

@section('content')
    <!-- <h1>All items</h1>
    <a href="{{ route('items.create') }}">Add item</a> |
    <a href="{{ route('items.show', 1) }}">Show item</a> -->
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Contacts</h2>
                    <div class="ml-auto">
                      <a href="{{ route('items.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
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
                    @if($items->count())
                      @foreach($items as $index => $item)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->release_date }}</td>
                          <td>{{ $item->category->name }}</td>
                          <td width="150">
                            <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                    <!-- <tr>
                      <th scope="row">2</th>
                      <td>Frederick</td>
                      <td>Jerde</td>
                      <td>frederick@test.com</td>
                      <td>Company one</td>
                      <td>
                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Joannie</td>
                      <td>McLaughlin</td>
                      <td>joannie@test.com</td>
                      <td>Company Two</td>
                      <td>
                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Odie</td>
                      <td>Koss</td>
                      <td>odie@test.com</td>
                      <td>Company Two</td>
                      <td>
                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Edna</td>
                      <td>Ondricka</td>
                      <td>edna@test.com</td>
                      <td>Company Three</td>
                      <td>
                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection