@extends('admin.layouts.app')

@section('title','Riwayat Diagnosa')

@section('content')

<div class="container position-relative">
    @if ($message = Session::get('message'))
    <div id="floatingAlert" class="alert alert-success floatingAlert">
        <strong>Berhasil</strong>
        <p>{{ $message }}</p>
    </div>
    @endif

    <h4 class="mb-4">Riwayat Diagnosa</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped data-table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">User</th>
                    <th>Hasil Diagnosa</th>
                    <th>Solusi</th>
                    <th class="text-center">Jumlah Solusi</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Kelola</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($riwayats as $riwayat)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>

                    <td class="text-center">
                        @if($riwayat->user)
                            {{ $riwayat->user->email }}
                        @else
                            <span class="badge bg-secondary">Guest</span>
                        @endif
                    </td>

                    <td>
                        @php
                            $hasilList = json_decode($riwayat->hasil_diagnosa, true);
                        @endphp
                        <ul class="mb-0">
                            @foreach($hasilList as $hasil)
                                <li>
                                    <strong>{{ $hasil['kerusakan'] }}</strong>
                                    ({{ $hasil['kode'] }}) 
                                    — {{ $hasil['nilai'] }}%
                                </li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        @php
                            $solusiList = json_decode($riwayat->solusi_diagnosa, true);
                        @endphp
                        <ul class="mb-0">
                            @foreach($solusiList as $solusi)
                                <li>{{ $solusi['deskripsi_solusi'] }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">{{ $riwayat->jumlah_solusi }}</td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($riwayat->tanggal_diagnosa)->format('d M Y H:i') }}
                    </td>

                    <td class="text-center">
                        <form action="{{ route('admin.riwayat.destroy', $riwayat->riwayat_id) }}" 
                            method="POST" 
                            onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
