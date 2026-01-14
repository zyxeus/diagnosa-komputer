@extends('admin.layouts.app')

@section('title', 'Data Solusi')

@section('content')

<div class="container position-relative">
    <a href="{{ route('admin.solusi.create') }}" class="btn btn-primary mb-3">Tambah Solusi</a>

    @if ($message = Session::get('message'))
    <div id="floatingAlert" class="alert alert-success floatingAlert">
        <strong>Berhasil</strong>
        <p>{{ $message }}</p>
    </div>
    @endif

    @include('admin.layouts.table-toolbar')

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped data-table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Solusi</th>
                    <th class="text-center">Nama Kerusakan</th>
                    <th class="text-center">Deskripsi Solusi</th>
                    <th class="text-center">Kelola</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($solusis as $solusi)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center">{{ $solusi->kode_solusi ?? '-' }}</td>
                    <td>{{ $solusi->kerusakan->nama_kerusakan ?? '-' }}</td>
                    <td>{{ $solusi->deskripsi_solusi ?? '-' }}</td>
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a href="{{ route('admin.solusi.edit', $solusi->kode_solusi) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.solusi.destroy', $solusi->kode_solusi) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
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
