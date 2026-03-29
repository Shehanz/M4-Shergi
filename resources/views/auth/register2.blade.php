<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('loginAssets/style.css') }}">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">⚡</div>
            <h2>Sign Up</h2>
            <p>Create your account</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    <label>Name</label>
                    <span class="input-line"></span>
                </div>
                @error('name')
                    <span class="error-message show">{{ $message }}</span>
                @enderror
            </div>

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

            <!-- Password -->
            <div class="form-group">
                <div class="input-wrapper password-wrapper">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <span class="input-line"></span>
                </div>
                @error('password')
                    <span class="error-message show">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm -->
            <div class="form-group">
                <div class="input-wrapper password-wrapper">
                    <input type="password" name="password_confirmation" required>
                    <label>Confirm Password</label>
                    <span class="input-line"></span>
                </div>
            </div>

            <button type="submit" class="login-btn btn">
                <span class="btn-text">Sign Up</span>
            </button>
        </form>

        <div class="signup-link">
            <p>Already have an account?
                <a href="{{ route('login') }}">Sign In</a>
            </p>
        </div>

        @if(session('success'))
            <div class="success-message show">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>

    <div class="background-effects">
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>
</div>

<script src="{{ asset('loginAssets/script.js') }}"></script>
</body>
</html>
