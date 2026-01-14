@extends('admin.layouts.app')

@section('title','Tambah Data Kerusakan')

@section('content')
<div class="container">
    <a href="{{ route('admin.kerusakan.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.kerusakan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="kode_kerusakan">Kode Kerusakan</label>
                    <input type="text" name="kode_kerusakan" class="form-control" placeholder="Contoh: K01" value="{{ old('kode_kerusakan') }}" required>
                    @error('kode_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_kerusakan">Nama Kerusakan</label>
                    <input type="text" name="nama_kerusakan" class="form-control" placeholder="Contoh: Komputer mati total" value="{{ old('nama_kerusakan') }}" required>
                    @error('nama_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Deskripsi wajib diisi --}}
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Kerusakan</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan detail kerusakan..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="gambar">Gambar (opsional)</label>
                    <input type="file" name="gambar" class="form-control-file">
                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
