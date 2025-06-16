<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Register</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Name is required</li>
                                            <li>Name must be a string</li>
                                            <li>Name cannot be longer than 255 characters</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Email is required</li>
                                            <li>Email must be a valid email address</li>
                                            <li>Email must be unique</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Mobile Field -->
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Mobile number is required</li>
                                            <li>Mobile number must be between 10-15 digits</li>
                                            <li>Mobile number must contain only numbers</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Country Field -->
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country</label>
                                <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Country is required</li>
                                            <li>Please select a valid country</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- State Field -->
                            <div class="mb-3">
                                <label for="state_id" class="form-label">State</label>
                                <select class="form-control @error('state_id') is-invalid @enderror" id="state_id" name="state_id" required>
                                    <option value="">Select State</option>
                                </select>
                                @error('state_id')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>State is required</li>
                                            <li>Please select a valid state</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- City Field -->
                            <div class="mb-3">
                                <label for="city_id" class="form-label">City</label>
                                <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                                    <option value="">Select City</option>
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>City is required</li>
                                            <li>Please select a valid city</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Address Field -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Address is required</li>
                                            <li>Address cannot be longer than 500 characters</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Gender Field -->
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Gender is required</li>
                                            <li>Please select a valid gender option</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Password is required</li>
                                            <li>Password must be at least 8 characters long</li>
                                            <li>Password must match the confirmation</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Confirmation Field -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <ul>
                                            <li>Password confirmation is required</li>
                                            <li>Password confirmation must match the password</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Get states when country changes
            $('#country_id').change(function() {
                var countryId = $(this).val();
                if(countryId) {
                    $.ajax({
                        url: '/get-states/' + countryId,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('#state_id').empty();
                            $('#city_id').empty();
                            $('#state_id').append('<option value="">Select State</option>');
                            $.each(data, function(key, value) {
                                $("#state_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state_id').empty();
                    $('#city_id').empty();
                }
            });

            // Get cities when state changes
            $('#state_id').change(function() {
                var stateId = $(this).val();
                if(stateId) {
                    $.ajax({
                        url: '/get-cities/' + stateId,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('#city_id').empty();
                            $('#city_id').append('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $("#city_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city_id').empty();
                }
            });
        });
    </script>
</body>
</html>
