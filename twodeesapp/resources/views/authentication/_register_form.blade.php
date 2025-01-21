<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Username</label>
            <div class="col-md-9">
                <input type="text" autocomplete="off" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email Address</label>
            <div class="col-md-9">
                <input type="email" autocomplete="off" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">Password</label>
            <div class="col-md-9">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password_confirmation" class="col-md-3 col-form-label">Confirm Password</label>
            <div class="col-md-9">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="profile_picture" class="col-md-3 col-form-label">Profile Picture</label>
            <div class="col-md-9">
                <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror"/>
                @error('profile_picture')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="{{ route('/') }}" class="btn btn-outline-secondary">Return to homepage</a>
            </div>
        </div>
    </div>
</div>