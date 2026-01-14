<head>
<meta charset="utf-8">
<title>Login - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('title', 'Login - Cek My PC')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">

        <h4 class="text-center mb-4">Login User</h4>

        {{-- Notifikasi berhasil reset password --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error login --}}
        @if($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="text-end mb-3">
                <a href="{{ route('user.password.request') }}" class="text-primary" style="font-size: 14px;">
                    Lupa password?
                </a>
            </div>

            <button class="btn btn-primary w-100">Login</button>

            <p class="text-center mt-3">
                Belum punya akun?
                <a href="{{ route('user.register.form') }}">Daftar</a>
            </p>

        </form>
    </div>
</div>
@endsection
