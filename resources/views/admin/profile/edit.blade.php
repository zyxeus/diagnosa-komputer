@extends('admin.layouts.app')

@section('title', 'Edit Profile Admin')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Edit Profile Admin</h4>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- UPDATE PROFILE -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Data Admin
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $admin->name) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $admin->email) }}"
                                   required>
                        </div>

                        <button class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- UPDATE PASSWORD -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Ubah Password
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Ulangi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-warning">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
