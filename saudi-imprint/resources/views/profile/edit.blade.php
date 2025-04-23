@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fs-2 fw-bold text-success">
            Profile
        </h2>        
        <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm w-auto"> Go Back</a>
    </div>

    @if ($errors->updatePassword->any())
    <div class="alert alert-danger border-0 shadow-sm">
        <ul class="mb-0">
            @foreach ($errors->updatePassword->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <!-- Update Profile Information -->
        <div class="p-4 bg-light shadow-sm rounded mb-4 border border-success border-opacity-25">
            <h3 class="fs-5 mb-3 text-success">Update Profile Information</h3>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm border-success" value="{{ old('name', $user->name) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm border-success" value="{{ old('email', $user->email) }}" required>
                </div>
                
                <button type="submit" class="btn btn-success btn-sm w-auto">Update Profile</button>
            </form>
        </div>
        
        <!-- Change Password -->
        <div class="p-4 bg-light shadow-sm rounded mb-4 border border-success border-opacity-25">
            <h3 class="fs-5 mb-3 text-success">Change Password</h3>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control form-control-sm border-success" required>
                </div>
                
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" id="new_password" name="password" class="form-control form-control-sm border-success" required>
                </div>
                
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm border-success" required>
                </div>
                
                <button type="submit" class="btn btn-success btn-sm w-auto">Change Password</button>
            </form>
        </div>
        
        <!-- Delete Account -->
        <div class="p-4 bg-white shadow-sm rounded border border-danger border-opacity-25">
            <h3 class="fs-5 mb-3 text-danger">Delete Account</h3>
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-outline-danger btn-sm w-auto">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection