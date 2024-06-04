@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('User create') }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6 mb-2">
                        <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-2">
                        <label for="email" class="form-label">{{ __('Email') }} <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" required>
                        <div id="emailHelp" class="form-text">{{ __('email helper') }}</div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mb-2">
                        <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mb-2">
                        <label for="password_confirmation" class="form-label">{{ __('Password Confirm') }} <span class="text-danger">*</span></label>
                        <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary mt-5">{{ __('Create') }}</button>
            </form>
        </div>
    </div>
@endsection
