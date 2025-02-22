<div class="card-body p-0">
    <div class="row table-responsive-header text-center">
        <div class="col header-item">
            Item
            <i id="arrow_filter" class="fa-solid fa-arrow-{{ 
                request('item') == 'asc' || request('item') == null ? 'up' : 
                (request('item') == 'desc' ? 'down' : '') }}">
            </i>
        </div>
        <div class="col header-item">
            Release Date
            <i id="arrow_filter" class="fa-solid fa-arrow-{{ 
                request('release_date') == 'asc' || request('release_date') == null ? 'up' : 
                (request('release_date') == 'desc' ? 'down' : '') }}">
            </i>
        </div>
        <div class="col header-item">
            Price
            <i id="arrow_filter" class="fa-solid fa-arrow-{{ 
                request('price') == 'asc' || request('price') == null ? 'up' : 
                (request('price') == 'desc' ? 'down' : '') }}">
            </i>
        </div>
    </div>
</div>
<hr>
<div class="card-body p-4">
    <div class="row d-flex justify-content-center">
        @foreach ($items as $item)
            <div class="col-md-4 col-12 mb-4">
                <div class="card" style="width: 100%; height: 100%;">
                    <img class="card-img-top" src="{{ ($item->image_path != null) ? asset($item->image_path) : '' }}" alt="{{ $item->name }}"/>
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->category->name }}</h6>
                            <h5>&euro;{{ $item->price }}</h5>
                            <p class="card-text">Released on {{ format_date($item->release_date) }}.</p>
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
                          </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>