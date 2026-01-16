<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password Admin - CekMyPC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.webp') }}" type="image/x-icon">

    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom Login Style -->
    <link href="{{ asset('assets/css/login.admin.css') }}" rel="stylesheet">
</head>

<body>
<div class="login-box">
    <div class="card">
        <div class="card-header">
            <h3>Reset Password</h3>
        </div>

        <div class="card-body">
            <p class="login-msg">Buat password baru untuk akun admin</p>

            {{-- Error global --}}
            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email Admin"
                           value="{{ $email ?? old('email') }}"
                           required>
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="input-group password-group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Password Baru"
                        required
                    >
                    <div class="input-group-text toggle-password" onclick="togglePassword('password', 'eyeIcon1')">
                        <i class="fas fa-eye" id="eyeIcon1"></i>
                    </div>
                </div>

                <div class="input-group password-group">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        placeholder="Konfirmasi Password"
                        required
                    >
                    <div class="input-group-text toggle-password" onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                        <i class="fas fa-eye" id="eyeIcon2"></i>
                    </div>
                </div>

                <button type="submit">Reset Password</button>
            </form>

            <div class="forgot-password">
                <a href="{{ route('admin.login') }}">← Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>
