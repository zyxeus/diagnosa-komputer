<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password Admin - CekMyPC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

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
            <h3>Lupa Password</h3>
        </div>

        <div class="card-body">
            <p class="login-msg">Masukkan email admin untuk reset password</p>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error --}}
            @error('email')
                <div class="alert-error">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="input-group">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email Admin"
                           value="{{ old('email') }}"
                           required>
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <button type="submit">Kirim Link Reset</button>
            </form>

            <div class="forgot-password">
                <a href="{{ route('admin.login') }}">← Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
