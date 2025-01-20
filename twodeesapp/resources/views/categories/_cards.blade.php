<div class="card-body p-0">
    <div class="row table-responsive-header text-center">
        <div class="col header-item">
            Category
            <i id="arrow_filter" class="fa-solid fa-arrow-{{ 
                request('category') == 'asc' || request('category') == null ? 'up' : 
                (request('category') == 'desc' ? 'down' : '') }}">
            </i>
        </div>
    </div>
</div>
<hr>
<div class="card-body p-4">
    <div class="row d-flex justify-content-center">
        @foreach ($categories as $category)
            <div class="col-md-4 col-12 mb-4">
                <div class="card" style="width: 100%; height: 100%;">
                    <img class="card-img-top" src="{{ ($category->image_path != null) ? asset($category->image_path) : '' }}" alt="{{ $category->name }}"/>
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="card-title">{{ $category->name }}</h4>
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('categories.show', $category->id) }}"
                                    class="btn btn-sm btn-circle btn-primary d-block d-md-inline-block mb-2 mb-md-0"
                                    title="Show">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('items.edit', $category->id) }}"
                                    class="btn btn-sm btn-circle btn-secondary d-block d-md-inline-block mb-2 mb-md-0"
                                    title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('items.destroy', $category->id) }}"
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