<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Item Name</label>
            <div class="col-md-9">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">Price</label>
            <div class="col-md-9">
                <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"/>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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