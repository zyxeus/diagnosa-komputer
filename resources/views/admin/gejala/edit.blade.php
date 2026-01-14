@extends('admin.layouts.app')

@section('title','Data Gejala')

@section('content')
<div class="container">
    <a href="{{ route('admin.gejala.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.gejala.update', $gejala->kode_gejala) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala</label>
                    <input type="text" class="form-control" name="kode_gejala" placeholder="Contoh: G01" value="{{ old('kode_gejala', $gejala->kode_gejala) }}">
                    @error('kode_gejala')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label>
                    <input type="text" class="form-control" name="nama_gejala" placeholder="Contoh: Komputer tidak mau menyala" value="{{ old('nama_gejala', $gejala->nama_gejala) }}">
                    @error('nama_gejala')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bobot_cf">Bobot CF</label>
                    <select name="bobot_cf" id="bobot_cf" class="form-control">
                        @for ($i = 0.0; $i <= 1.0; $i += 0.1)
                            <option value="{{ number_format($i, 1) }}" 
                                {{ old('bobot_cf', number_format($gejala->bobot_cf, 1)) == number_format($i, 1) ? 'selected' : '' }}>
                                {{ number_format($i, 1) }}
                            </option>
                        @endfor
                    </select>
                    @error('bobot_cf')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update Gejala</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
