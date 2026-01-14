<head>
<meta charset="utf-8">
<title>Reset Password - CekMyPC</title>

<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">

<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
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
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Ulangi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                Reset Password
            </button>

        </form>
    </div>
</div>
@endsection
