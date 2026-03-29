<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{ asset('loginAssets/style.css') }}">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">⚡</div>
            <h2>Reset Password</h2>
            <p>We’ll send you a reset link</p>
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="login-form">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <div class="input-wrapper">
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <label>Email</label>
                    <span class="input-line"></span>
                </div>
                @error('email')
                    <span class="error-message show">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="login-btn btn">
                <span class="btn-text">Send Reset Link</span>
            </button>
        </form>

        <div class="signup-link">
            <p>Back to
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>

        @if (session('status'))
            <div class="success-message show">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <div class="background-effects">
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>
</div>
</body>
</html>
