<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - CekMyPC</title>
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
    .password-group {
    position: relative;
}

.password-group .toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    font-size: 16px;
}

.password-group .toggle-password:hover {
    color: #333;
}

    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>

            <div class="card-body">
                <p class="login-msg">Sign in to start your session</p>

                {{-- Error umum --}}
                @error('loginError')
                    <div class="alert-error">
                        <strong><i class="fas fa-exclamation-triangle"></i> Error:</strong>
                        <p>{{ $message }}</p>
                    </div>
                @enderror

                {{-- Form Login --}}
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                    @error('email')
                        <div class="alert-error">{{ $message }}</div>
                    @enderror

                    <div class="input-group password-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        
                        <!-- Icon mata -->
                        <span class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>

                    @error('password')
                        <div class="alert-error">{{ $message }}</div>
                    @enderror

                    {{-- Lupa Password --}}
                    <div class="forgot-password">
                        <a href="{{ route('admin.password.request') }}">Lupa password?</a>
                    </div>

                    <button type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>

</html>