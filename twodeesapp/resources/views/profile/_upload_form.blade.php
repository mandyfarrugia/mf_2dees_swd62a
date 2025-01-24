<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-12">
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
                <a href="{{ route('profile.index', $user->id) }}" class="btn btn-outline-secondary">Return to profile</a>
            </div>
        </div>
    </div>
</div>