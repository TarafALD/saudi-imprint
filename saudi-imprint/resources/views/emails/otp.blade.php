<!DOCTYPE html>
<html>
<head>
    <title>Your Login Verification Code</title>
</head>
<body>
    <h1>Hello {{ $user->name }}</h1>
    <p>Your verification code is: <strong>{{ $otp }}</strong></p>
    <p>This code will expire in 5 minutes.</p>
</body>
</html>