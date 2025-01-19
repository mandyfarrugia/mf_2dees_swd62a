<div class="card-body p-4">
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-4 col-12 mb-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ ($item->image_path != null) ? asset($item->image_path) : '' }}" alt="Card image cap"/>
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->category->name }}</h6>
                            <h5>&euro;{{ $item->price }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('items.edit', $item->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('items.destroy', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>