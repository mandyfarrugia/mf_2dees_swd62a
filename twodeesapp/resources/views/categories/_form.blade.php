<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Category Name</label>
            <div class="col-md-9">
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="image_path" class="col-md-3 col-form-label">Image</label>
            <div class="col-md-9">
                <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror"/>
                @error('image_path')
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
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Return to items</a>
            </div>
        </div>
    </div>
</div>