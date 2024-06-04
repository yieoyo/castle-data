@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ __('Profile') }}</span>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark"><span
                        class="bi bi-pencil"></span> </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Name and Email -->
                <div class="col-md-9">
                    <!-- Full Name -->
                    <h3>{{ $user->name }}</h3>

                    <!-- Email with Mail Icon -->
                    <p><strong><i class="bi bi-envelope-check"></i></strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
