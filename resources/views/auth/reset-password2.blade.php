<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>

    <link rel="stylesheet" href="{{ asset('loginAssets/style.css') }}">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">⚡</div>
            <h2>New Password</h2>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="login-form">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="form-group">
                <div class="input-wrapper">
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required>
                    <label>Email</label>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <div class="input-wrapper password-wrapper">
                    <input type="password" name="password" required>
                    <label>New Password</label>
                </div>
            </div>

            <!-- Confirm -->
            <div class="form-group">
                <div class="input-wrapper password-wrapper">
                    <input type="password" name="password_confirmation" required>
                    <label>Confirm Password</label>
                </div>
            </div>

            <button type="submit" class="login-btn btn">
                Reset Password
            </button>
        </form>
    </div>
</div>
</body>
</html>
