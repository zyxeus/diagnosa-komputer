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

                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
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
</html>