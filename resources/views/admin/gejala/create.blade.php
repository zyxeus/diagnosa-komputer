@extends('admin.layouts.app')

@section('title','Data Gejala')

@section('content')
<div class="container">
    <a href="{{ route('admin.gejala.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.gejala.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label>
                    <input type="text" id="kode_gejala" name="kode_gejala" class="form-control" placeholder="Contoh: G01" value="{{ old('kode_gejala') }}">
                    @error('kode_gejala')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label>
                    <input type="text" id="nama_gejala" name="nama_gejala" class="form-control" placeholder="Contoh: Komputer tidak bisa menyala" value="{{ old('nama_gejala') }}">
                    @error('nama_gejala')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bobot_cf">Bobot CF</label>
                    <select id="bobot_cf" name="bobot_cf" class="form-control">
                        @for ($i = 0.0; $i <= 1.0; $i += 0.1)
                            <option value="{{ number_format($i, 1) }}" {{ old('bobot_cf') == number_format($i, 1) ? 'selected' : '' }}>
                                {{ number_format($i, 1) }}
                            </option>
                        @endfor
                    </select>
                    @error('bobot_cf')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
