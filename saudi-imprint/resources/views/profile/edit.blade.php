@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold fs-4 text-gray-800">
            Profile
        </h2>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm w-auto">← Go Back</a>
    </div>

    <div class="py-4">
        <!-- Update Profile Information -->
        <div class="p-4 bg-white shadow rounded mb-4">
            <h3 class="fs-5 mb-3">Update Profile Information</h3>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" value="{{ old('email', $user->email) }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-sm w-auto">Update Profile</button>
            </form>
        </div>

            <!-- Change Password -->
        <div class="p-4 bg-white shadow rounded mb-4">
            <h3 class="fs-5 mb-3">Change Password</h3>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control form-control-sm" required>
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" id="new_password" name="password" class="form-control form-control-sm" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm" required>
                </div>

                <button type="submit" class="btn btn-warning btn-sm w-auto">Change Password</button>
            </form>
        </div>


        <!-- Delete Account -->
        <div class="p-4 bg-white shadow rounded">
            <h3 class="fs-5 mb-3 text-danger">Delete Account</h3>
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm w-auto">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
