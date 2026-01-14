@extends('admin.layouts.app')

@section('title','Edit Data Proses Diagnosa')

@section('content')
<div class="container">
    <a href="{{ route('admin.proses.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.proses.update', $proses->proses_id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group mb-3">
                    <label for="kode_gejala">Gejala</label>
                    <select name="kode_gejala" class="form-control" required>
                        <option value="">-- Pilih Gejala --</option>
                        @foreach($gejalas as $gejala)
                            <option value="{{ $gejala->kode_gejala }}" {{ $proses->kode_gejala == $gejala->kode_gejala ? 'selected' : '' }}>
                                {{ $gejala->kode_gejala }} - {{ $gejala->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                    @error('kode_gejala')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kode_kerusakan">Kerusakan</label>
                    <select name="kode_kerusakan" class="form-control" required>
                        <option value="">-- Pilih Kerusakan --</option>
                        @foreach($kerusakans as $kerusakan)
                            <option value="{{ $kerusakan->kode_kerusakan }}" {{ $proses->kode_kerusakan == $kerusakan->kode_kerusakan ? 'selected' : '' }}>
                                {{ $kerusakan->kode_kerusakan }} - {{ $kerusakan->nama_kerusakan }}
                            </option>
                        @endforeach
                    </select>
                    @error('kode_kerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nilai_cf">Nilai Certainty Factor (CF)</label>
                    <input type="number" name="nilai_cf" class="form-control" step="0.01" min="0" max="1" placeholder="Contoh: 0.8" value="{{ old('nilai_cf', $proses->nilai_cf) }}" required>
                    @error('nilai_cf')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-block">Update Proses Diagnosa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
