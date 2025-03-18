<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container .form-control {
            border-radius: 8px;
        }
        .login-container .btn {
            border-radius: 8px;
            background-color: #71c55d;
            border:none;
            font-weight: bold;
        }
        .login-container .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <h3 class="text-center mb-4">LOGIN </h3>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('loginTG') }}">
            @csrf
           
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email" required required autofocus autocomplete="username" >
                </div>
                <x-input-error :messages="$errors->get('email')" class="alert alert-danger mt-2" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <x-input-error :messages="$errors->get('password')" class="alert alert-danger mt-2" />
            </div>
                
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>

            <p class="text-center mt-3">Dont have an account? <a style="color: #758015; text-decoration: none;" href="{{ route('signupT') }}">Sign up</a></p>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>