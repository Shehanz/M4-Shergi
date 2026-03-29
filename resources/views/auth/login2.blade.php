<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('loginAssets/style.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-icon">⚡</div>
                <h2>Sign In</h2>
                <p>Access your account</p>
            </div>

            @if (session('status'))
                <div class="success-message show">
                    <h3>{{ session('status') }}</h3>
                </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('login') }}">
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

                <!-- Remember -->
                <div class="form-options">
                    <div class="remember-wrapper">
                        <input type="checkbox" name="remember" value="1">
                        <label class="checkbox-label">
                            <span class="custom-checkbox"></span>
                            Keep me signed in
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="login-btn btn">
                    <span class="btn-text">Sign In</span>
                    <span class="btn-loader"></span>
                    <span class="btn-glow"></span>
                </button>
            </form>

            <!-- Register Link -->
            <div class="signup-link">
                <p>New here?
                    <a href="{{ route('register') }}">Create an account</a>
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="success-message show">
                    <div class="success-icon">✓</div>
                    <h3>Success</h3>
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

    <script src="{{ asset('shared/js/form-utils.js') }}"></script>
    <script src="{{ asset('loginAssets/script.js') }}"></script>
</body>

</html>
