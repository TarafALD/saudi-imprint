<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            border: none;
            font-weight: bold;
        }
        .login-container .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
        }
        .login-container .btn-secondary {
            background-color: #dee2e6;
            border: none;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <h4 class="text-center mb-3">OTP Verification</h4>

        <div class="mb-3 text-muted text-center">
            {{ __('Please enter the verification code that was sent to your email.') }}
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <div class="mb-3">
                <label for="otp" class="form-label">Verification Code</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                    <input id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}" required autofocus>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn btn-success w-50">
                    {{ __('Verify') }}
                </button>

                <a href="{{ route('otp.send') }}" class="btn btn-secondary ms-2 w-50 text-center">
                    {{ __('Resend Code') }}
                </a>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
