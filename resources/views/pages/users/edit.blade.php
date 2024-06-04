@extends('layouts.app', ['pageName' => config('pages.users.edit')]) <!-- Extending the layout from the 'app.blade.php' file -->

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('User update') }}</h5> <!-- Card title for basic information -->
                </div>
                <div class="card-body">
                    <!-- Form for updating users basic information -->
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @method('PUT') <!-- Method spoofing to use PUT method -->
                        @csrf <!-- CSRF protection -->

                        <div class="row">
                            <div class="col-12 mb-2">
                                <!-- Input field for user's name -->
                                <label for="name" class="form-label">{{ __('Full name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" value="{{ $user->name }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for name input -->
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <!-- Input field for user's email (disabled) -->
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                       value="{{ $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                <!-- Error message for email input -->
                                @enderror
                            </div>

                            <div class="col-12 mt-2">
                                <!-- Button to submit users update -->
                                <button type="submit" class="btn btn-secondary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Update password') }}</h5> <!-- Card title for updating password -->
                </div>
                <div class="card-body">
                    <!-- Form for updating user's password -->
                    <form method="POST" action="{{ route('users.changePassword', $user->id) }}">
                        @method('PUT') <!-- Method spoofing to use PUT method -->
                        @csrf <!-- CSRF protection -->

                        <div class="mb-3">
                            <!-- Input field for new password -->
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <!-- Input field for confirming new password -->
                            <label for="password_confirmation" class="form-label">{{ __('Password Confirm') }}</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation"
                                   required>
                        </div>

                        <!-- Button to submit password update -->
                        <button type="submit" class="btn btn-secondary">{{ __('Update Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection <!-- Closing the content section -->
