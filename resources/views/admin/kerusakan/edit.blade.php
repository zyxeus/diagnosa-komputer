@extends('admin.layouts.app')

@section('title','Edit Data Kerusakan')

@section('content')
<div class="container">
    <a href="{{ route('admin.kerusakan.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.kerusakan.update', $kerusakan->kode_kerusakan) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- Kode Kerusakan --}}
                <div class="form-group mb-3">
                    <label for="kode_kerusakan">Kode Kerusakan</label>
                    <input type="text" class="form-control" name="kode_kerusakan" placeholder="Contoh: K01" value="{{ old('kode_kerusakan', $kerusakan->kode_kerusakan) }}">
                    @error('kode_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Nama Kerusakan --}}
                <div class="form-group mb-3">
                    <label for="nama_kerusakan">Nama Kerusakan</label>
                    <input type="text" class="form-control" name="nama_kerusakan" placeholder="Contoh: Komputer tidak mau menyala" value="{{ old('nama_kerusakan', $kerusakan->nama_kerusakan) }}">
                    @error('nama_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Kerusakan</label>
                    <textarea class="form-control" name="deskripsi" rows="4" placeholder="Jelaskan detail kerusakan..." required>{{ old('deskripsi', $kerusakan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="form-group mb-3">
                    <label for="gambar">Gambar (kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="gambar" class="form-control-file">
                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    @if ($kerusakan->gambar)
                        <div class="mt-2">
                            <p>Gambar Saat Ini:</p>
                            <img src="{{ asset('images/' . $kerusakan->gambar) }}" alt="Gambar" width="120">
                        </div>
                    @endif
                </div>

                {{-- Tombol Submit --}}
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success w-100">Update Kerusakan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
