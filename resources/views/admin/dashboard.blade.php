@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<style>
    .card-stat {
        border: none;
        border-radius: 15px;
        transition: .3s;
    }
    .card-stat:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    .icon-wrap {
        font-size: 42px;
        color: white;
        padding: 18px;
        border-radius: 12px;
    }
</style>

<div class="container-fluid">

    <h4 class="fw-bold mb-4">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard Admin
    </h4>

    <!-- Statistik Card -->
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card card-stat shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-wrap bg-primary m-2">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total User</h6>
                        <h3 class="fw-bold text-primary">{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card card-stat shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-wrap bg-success m-2">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Admin</h6>
                        <h3 class="fw-bold text-success">{{ $totalAdmin }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card card-stat shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-wrap bg-warning m-2">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Gejala</h6>
                        <h3 class="fw-bold text-warning">{{ $totalGejala }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card card-stat shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-wrap bg-danger m-2">
                        <i class="bi bi-bug"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Kerusakan</h6>
                        <h3 class="fw-bold text-danger">{{ $totalKerusakan }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Riwayat Diagnosa -->
    <div class="card shadow border-0 mt-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5 class="mb-0"><i class="bi bi-clipboard2-pulse me-2"></i>Riwayat Diagnosa</h5>
        </div>

        <div class="card-body">
            <h2 class="fw-bold text-primary">{{ $totalRiwayat }}</h2>
            <p class="text-muted mb-0">Total riwayat diagnosa yang tersimpan pada sistem.</p>
        </div>
    </div>

    <!-- Testimoni Terbaru -->
    <div class="card shadow border-0 mt-4 mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-chat-dots me-2"></i> Testimoni Terbaru</h5>
        </div>

        <div class="card-body">
            @forelse ($testimoni as $t)
                <div class="alert alert-light border shadow-sm">
                    <div class="d-flex justify-content-between">
                        <strong><i class="bi bi-person-circle me-2"></i>User ID: {{ $t->user_id }}</strong>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $t->tanggal_input }}</small>
                    </div>
                    <p class="mb-0 mt-2">{{ $t->isi_testimoni }}</p>
                </div>
            @empty
                <p class="text-muted">Belum ada testimoni tampil.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
