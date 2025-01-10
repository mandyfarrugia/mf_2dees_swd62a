<div class="row p-4">
    <div class="col-sm-6 col-md-3 mb-3">
        <label for="filter_category_id">Category</label>
        <select id="filter_category_id" class="form-control">
            @foreach ($categories as $id => $name)
                <option {{ $id == request('category_id') ? 'selected' : '' }} value="{{ $id }}">
                    {{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6 col-md-3 mb-3">
        @php
            $dateFilterOptions = [
                null => 'Filter by date',
                'asc' => 'Date furthest from now',
                'desc' => 'Dates closest to now',
            ];
        @endphp
        <label for="filter_date">Date Filter</label>
        <select id="filter_date" class="form-control">
            @foreach ($dateFilterOptions as $order => $option)
                <option {{ $order == request('date') ? 'selected' : '' }} value="{{ $order }}">
                    {{ $option }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6 col-md-2 mb-3">
        <label for="min_price">Minimum Price</label>
        <input type="number" class="form-control" id="min_price" />
    </div>
    <div class="col-sm-6 col-md-2 mb-3">
        <label for="max_price">Maximum Price</label>
        <input type="number" class="form-control" id="max_price" />
    </div>
    <div class="col-sm-6 col-md-2 mb-3 d-flex align-items-end ml-md-0">
        <a href="" class="btn btn-info w-100" id="apply_filter_btn">Apply filter</a>
    </div>
</div>