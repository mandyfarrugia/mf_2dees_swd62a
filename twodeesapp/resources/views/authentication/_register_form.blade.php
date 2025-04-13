<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Name</label>
            <div class="col-md-9">
                <input type="text" autocomplete="off" name="name" id="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Surname</label>
            <div class="col-md-9">
                <input type="text" autocomplete="off" name="surname" id="surname" value="{{ old('surname') }}"
                    class="form-control @error('surname') is-invalid @enderror">
                @error('surname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Username</label>
            <div class="col-md-9">
                <input type="text" autocomplete="off" name="username" id="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email Address</label>
            <div class="col-md-9">
                <input type="email" autocomplete="off" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
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
                <input type="password" name="password" id="password"
                    class="form-control rounded @error('password') is-invalid @enderror"/>
                <button class="toggle-password" type="button" class="d-none"
                    aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                </button>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class=" form-group row">
            <label for="password_confirmation" class="col-md-3 col-form-label">Confirm Password</label>
            <div class="input-group col-md-9">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"/>
                <button class="toggle-password" type="button" class="d-none"
                    aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                </button>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="birth_date" class="col-md-3 col-form-label">Date of birth</label>
            <div class="col-md-9">
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                    class="form-control @error('birth_date') is-invalid @enderror">
                @error('birth_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="location_id" class="col-md-3 col-form-label">Location</label>
            <div class="col-md-9">
                <select name="location_id" id="location_id"
                    class="form-control @error('location_id') is-invalid @enderror">
                    @foreach ($locations as $id => $name)
                        <option {{ $id == old('location_id') ? 'selected' : '' }} value="{{ $id }}">
                            {{ $name }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="profile_picture" class="col-md-3 col-form-label">Profile Picture</label>
            <div class="col-md-9">
                <input type="file" name="profile_picture" id="profile_picture"
                    class="form-control @error('profile_picture') is-invalid @enderror" />
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
