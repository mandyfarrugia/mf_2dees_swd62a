<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="item_name" class="col-md-3 col-form-label">Item Name</label>
            <div class="col-md-9">
                <input type="text" name="item_name" id="item_name" class="form-control is-invalid">
                <div class="invalid-feedback">
                    Please enter a name to identify the item.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="release_date" class="col-md-3 col-form-label">Release Date</label>
            <div class="col-md-9">
                <input type="date" name="release_date" id="release_date" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="category_id" class="col-md-3 col-form-label">Category</label>
            <div class="col-md-9">
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $id => $name)
                        <option {{ $id == request('category_id') ? 'selected' : '' }} value="{{ $id }}">
                            {{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Return to items</a>
            </div>
        </div>
    </div>
</div>