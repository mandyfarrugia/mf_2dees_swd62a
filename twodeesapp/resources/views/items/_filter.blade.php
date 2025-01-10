<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <select id="filter_category_id" class="custom-select">
                        @foreach($categories as $id => $name)
                            <option {{ $id == request('category_id') ? 'selected' : ''}} value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    @php
                        $dateFilterOptions = array(null => "Filter by date",
                            "asc" => "Date furthest from now",
                            "desc" => "Dates closest to now");
                    @endphp
                    <select id="filter_date" class="custom-select">
                        @foreach($dateFilterOptions as $order => $option)
                            <option {{ $order == null ? 'disabled' : '' }} {{ $order == request('date') ? 'selected' : '' }} value="{{ $order }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="form-group" id="price_filter">
                        <label>Minimum price</label>
                        <input type="number" class="form-control" id="min_price"/>
                    </div>
                    <div class="form-group" id="price_filter">
                        <label>Maximum price</label>
                        <input type="number" class="form-control" id="max_price"/>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="form-group">
                        <a href="" class="btn btn-info">Apply filter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>