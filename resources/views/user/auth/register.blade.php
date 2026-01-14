<head>
<meta charset="utf-8">
<title>Register - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
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
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Ulangi Password" required>

            <button class="btn btn-success w-100">Daftar</button>

            <p class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('user.login.form') }}">Login</a>
            </p>

        </form>
    </div>
</div>
@endsection
