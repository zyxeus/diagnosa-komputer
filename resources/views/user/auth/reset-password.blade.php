<head>
<meta charset="utf-8">
<title>Reset Password - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.webp') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('title', 'Reset Password - Cek My PC')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card p-4 shadow" style="max-width:450px;width:100%">

        <h4 class="text-center mb-3">Reset Password</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       class="form-control"
                       value="{{ request('email') }}" required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <div class="input-group">
                    <input type="password"
                           name="password"
                           id="new_password"
                           class="form-control"
                           required>

                    <span class="input-group-text toggle-password"
                          onclick="togglePassword('new_password', 'eyeNew')">
                        <i class="fas fa-eye" id="eyeNew"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label>Ulangi Password</label>
                <div class="input-group">
                    <input type="password"
                           name="password_confirmation"
                           id="confirm_password"
                           class="form-control"
                           required>

                    <span class="input-group-text toggle-password"
                          onclick="togglePassword('confirm_password', 'eyeConfirm')">
                        <i class="fas fa-eye" id="eyeConfirm"></i>
                    </span>
                </div>
            </div>

            <button class="btn btn-primary w-100">
                Reset Password
            </button>

        </form>
    </div>
</div>

<script>
function togglePassword(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(eyeId);

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
