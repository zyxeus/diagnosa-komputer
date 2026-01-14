<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::orderBy('kode_gejala', 'asc')->get();
        return view('admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala'  => 'required|unique:gejala,kode_gejala',
            'nama_gejala'  => 'required',
            'bobot_cf'  => 'required|numeric|min:0.0|max:1',
        ]);

        Gejala::create($request->only(['kode_gejala', 'nama_gejala', 'bobot_cf']));

        return redirect()->route('admin.gejala.index')->with('message', 'Gejala berhasil ditambahkan');
    }

    public function show(Gejala $gejala)
    {
        return view('admin.gejala.show', compact('gejala'));
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode_gejala'  => 'required|unique:gejala,kode_gejala,' . $gejala->kode_gejala . ',kode_gejala',
            'nama_gejala'  => 'required',
            'bobot_cf'  => 'required|numeric|min:0.0|max:1',
        ]);

        $gejala->update($request->only(['kode_gejala', 'nama_gejala', 'bobot_cf']));

        return redirect()->route('admin.gejala.index')->with('message', 'Gejala berhasil diperbarui');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->route('admin.gejala.index')->with('message', 'Gejala berhasil dihapus');
    }
}
