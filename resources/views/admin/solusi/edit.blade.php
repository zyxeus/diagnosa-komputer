@extends('admin.layouts.app')

@section('title','Edit Data Solusi')

@section('content')
<div class="container">
    <a href="{{ route('admin.solusi.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.solusi.update', $solusi->kode_solusi) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group mb-3">
                    <label for="kode_kerusakan">Pilih Kerusakan</label>
                    <select name="kode_kerusakan" class="form-control" required>
                        <option value="">-- Pilih Kerusakan --</option>
                        @foreach ($kerusakans as $kerusakan)
                            <option value="{{ $kerusakan->kode_kerusakan }}" {{ $solusi->kode_kerusakan == $kerusakan->kode_kerusakan ? 'selected' : '' }}>
                                {{ $kerusakan->kode_kerusakan }} - {{ $kerusakan->nama_kerusakan }}
                            </option>
                        @endforeach
                    </select>
                    @error('kode_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kode_solusi">Kode Solusi</label>
                    <input type="text" name="kode_solusi" class="form-control" 
                        value="{{ old('kode_solusi', $solusi->kode_solusi) }}" 
                        placeholder="Contoh: S001" required>
                    @error('kode_solusi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi_solusi">Deskripsi Solusi</label>
                    <textarea name="deskripsi_solusi" class="form-control" rows="4" placeholder="Masukkan deskripsi solusi">{{ old('deskripsi_solusi', $solusi->deskripsi_solusi) }}</textarea>
                    @error('deskripsi_solusi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Update Solusi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
