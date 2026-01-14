<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proses;
use App\Models\Gejala;
use App\Models\Kerusakan;

class ProsesController extends Controller
{
    public function index()
    {
        $proses = Proses::with('gejala', 'kerusakan')->get();
        return view('admin.proses.index', compact('proses'));
    }

    public function create()
    {
        $gejalas = Gejala::all();
        $kerusakans = Kerusakan::all();
        return view('admin.proses.create', compact('gejalas', 'kerusakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|exists:gejala,kode_gejala',
            'kode_kerusakan' => 'required|exists:kerusakan,kode_kerusakan',
            'nilai_cf' => 'required|numeric|between:0,1',
        ]);

        Proses::create($request->only(['kode_gejala', 'kode_kerusakan', 'nilai_cf']));

        return redirect()->route('admin.proses.index')->with('success', 'Data berhasil disimpan.');
    }

    // 🔥 Route Model Binding
    public function edit(Proses $proses)
    {
        $gejalas = Gejala::all();
        $kerusakans = Kerusakan::all();
        return view('admin.proses.edit', compact('proses','gejalas','kerusakans'));
    }

    public function update(Request $request, Proses $proses)
    {
        $request->validate([
            'kode_gejala' => 'required|exists:gejala,kode_gejala',
            'kode_kerusakan' => 'required|exists:kerusakan,kode_kerusakan',
            'nilai_cf' => 'required|numeric|between:0,1',
        ]);

        $proses->update($request->only(['kode_gejala','kode_kerusakan','nilai_cf']));

        return redirect()->route('admin.proses.index')->with('success','Data berhasil diupdate.');
    }

    public function destroy(Proses $proses)
    {
        $proses->delete();
        return back()->with('success','Data berhasil dihapus.');
    }
}

