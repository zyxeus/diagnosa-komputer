@extends('admin.layouts.app')

@section('title','Data Proses')

@section('content')

<div class="container position-relative">
    <a href="{{ route('admin.proses.create') }}" class="btn btn-primary mb-3">Tambah Proses Diagnosa</a>

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
                    <th class="text-center">Gejala</th>
                    <th class="text-center">Kerusakan</th>
                    <th class="text-center">Nilai CF</th>
                    <th class="text-center">Kelola</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($proses as $item)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td>{{ $item->gejala->kode_gejala ?? '-' }} - {{ $item->gejala->nama_gejala ?? '-' }}</td>
                    <td>{{ $item->kerusakan->kode_kerusakan ?? '-' }} - {{ $item->kerusakan->nama_kerusakan ?? '-' }}</td>
                    <td class="text-center">{{ number_format($item->nilai_cf, 2) }}</td>
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a href="{{ route('admin.proses.edit', $item->proses_id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.proses.destroy', $item->proses_id) }}" method="POST" style="display:inline-block">
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
