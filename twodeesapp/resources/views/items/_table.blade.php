<div class="card-body p-0">              
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Item <i id="arrow_filter" class="fa-solid fa-arrow-{{ request('item') == 'asc' || request('item') == null ? 'up' : (request('item') == 'desc' ? 'down' : '')  }}"></i></th>
                    <th scope="col">Release Date <i id="arrow_filter" class="fa-solid fa-arrow-{{ request('release_date') == 'asc' || request('release_date') == null ? 'up' : (request('release_date') == 'desc' ? 'down' : '')  }}"></i></th>
                    <th scope="col">Price <i id="arrow_filter" class="fa-solid fa-arrow-{{ request('price') == 'asc' || request('price') == null ? 'up' : (request('price') == 'desc' ? 'down' : '')  }}"></i></th>
                    @if(request('category_id') == null)
                        <th scope="col">Category</th>
                    @endif
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ format_date($item->release_date) }}</td>
                        <td>&euro;{{ $item->price }}</td>
                        @if(request('category_id') == null)
                            <td>{{ $item->category->name }}</td>
                        @endif
                        <td width="150">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="btn btn-sm btn-circle btn-primary d-block d-md-inline-block mb-2 mb-md-0"
                                    title="Show">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('items.edit', $item->id) }}"
                                    class="btn btn-sm btn-circle btn-secondary d-block d-md-inline-block mb-2 mb-md-0"
                                    title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('items.destroy', $item->id) }}"
                                    class="btn-delete btn btn-sm btn-circle btn-danger d-block d-md-inline-block mb-2 mb-md-0"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>