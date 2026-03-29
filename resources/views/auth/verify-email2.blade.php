<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="{{ asset('loginAssets/style.css') }}">
</head>

<body>
<div class="login-container">
    <div class="login-card">

        <div class="login-header">
            <div class="logo-icon">📩</div>
            <h2>Verify Your Email</h2>
            <p>Kami telah mengirim link verifikasi ke email anda</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message show">
                <h3>Email verifikasi baru udah dikirim!</h3>
            </div>
        @endif

        <div class="form-group" style="text-align:center; margin-bottom:20px;">
            <p style="color:#a0a0b0;">
                Klik link di email anda untuk melanjutkan ke dashboard.
            </p>
        </div>

        <!-- Resend Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="login-btn btn">
                Kirim Ulang Email
            </button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
            @csrf
            <button type="submit" class="login-btn btn" style="background:#ff4d6d;">
                Logout
            </button>
        </form>

    </div>
</div>
</body>
</html>
