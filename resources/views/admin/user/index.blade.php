@extends('admin.layouts.app')

@section('title','Data Pengguna')

@section('content')

<div class="container position-relative">
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
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Status Aktif</th>
                    <th class="text-center">Kelola</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">{{ ucfirst($user->role) }}</td>
                    <td class="text-center">
                        @if($user->status_aktif == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.user.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
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
