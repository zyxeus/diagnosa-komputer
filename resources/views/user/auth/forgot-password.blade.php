<head>
<meta charset="utf-8">
<title>Lupa Password - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('title', 'Lupa Password - Cek My PC')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card p-4 shadow" style="max-width:450px;width:100%">

        <h4 class="text-center mb-3">Lupa Password</h4>
        <p class="text-center text-muted">Masukkan email akun Anda</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.password.email') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" required>
            </div>

            <button class="btn btn-primary w-100">
                Kirim Link Reset Password
            </button>

            <div class="text-center mt-3">
                <a href="{{ route('user.login.form') }}">Kembali ke Login</a>
            </div>
        </form>

    </div>
</div>
@endsection
