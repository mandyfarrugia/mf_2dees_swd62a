<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email Address</label>
            <div class="col-md-9">
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">Password</label>
            <div class="input-group col-md-9">
                <input type="password" required name="password" id="password" class="form-control rounded @error('password') is-invalid @enderror">
                <button class="toggle-password d-none" type="button" 
                    aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                </button>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button>
                <a href="{{ route('/') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-house"></i> Return to base</a>
            </div>
        </div>
    </div>
</div>