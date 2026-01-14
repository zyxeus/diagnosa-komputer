@extends('admin.layouts.app')

@section('title', 'Testimoni Pengguna')

@section('content')

<div class="container position-relative">
    @if ($message = Session::get('message'))
        <div id="floatingAlert" class="alert alert-success alert-dismissible fade show floatingAlert" role="alert">
            <strong>Berhasil!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <h4 class="mb-4">Data Testimoni</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped data-table">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Isi Testimoni</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonis as $index => $testimoni)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">
                            {{ $testimoni->user->email ?? 'Guest' }}
                        </td>
                        <td>{!! nl2br(e($testimoni->isi_testimoni)) !!}</td>
                        <td class="text-center">
                            <span class="badge {{ $testimoni->status == 'tampil' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($testimoni->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($testimoni->tanggal_input)->format('d M Y H:i') }}
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.testimoni.destroy', $testimoni->testimoni_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                            <form action="{{ route('admin.testimoni.toggle', $testimoni->testimoni_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Ubah status testimoni ini?')">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm {{ $testimoni->status == 'tampil' ? 'btn-secondary' : 'btn-success' }}">
                                    {{ $testimoni->status == 'tampil' ? 'Arsipkan' : 'Tampilkan' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada testimoni.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('admin.layouts.table-pagination')
    
</div>

<style>
.floatingAlert {
    position: absolute;
    top: -20px;
    right: 0;
    z-index: 10;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    animation: fadeSlideIn 0.4s ease-out;
}

@keyframes fadeSlideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const alert = document.getElementById('floatingAlert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }, 1000);
    }
});
</script>

@endsection
