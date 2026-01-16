<head>
<meta charset="utf-8">
<title>Register - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.webp') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('title', 'Register - Cek My PC')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">

        <h4 class="text-center mb-4">Register User</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}" placeholder="Nama" required>
            <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}" placeholder="Email" required>
            <div class="mb-3 position-relative">
                <input type="password"
                    name="password"
                    id="register_password"
                    class="form-control"
                    placeholder="Password"
                    required>

                <i class="fas fa-eye toggle-password"
                onclick="toggleRegisterPassword('register_password', this)"></i>
            </div>

            <div class="mb-3 position-relative">
                <input type="password"
                    name="password_confirmation"
                    id="register_password_confirm"
                    class="form-control"
                    placeholder="Ulangi Password"
                    required>

                <i class="fas fa-eye toggle-password"
                onclick="toggleRegisterPassword('register_password_confirm', this)"></i>
            </div>

            <button class="btn btn-success w-100">Daftar</button>

            <p class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('user.login.form') }}">Login</a>
            </p>

        </form>
    </div>
</div>

<script>
    function toggleRegisterPassword(inputId, icon) {
        const input = document.getElementById(inputId);

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

@endsection
