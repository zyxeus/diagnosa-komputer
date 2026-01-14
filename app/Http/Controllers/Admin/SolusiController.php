<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solusi;
use App\Models\Kerusakan;

class SolusiController extends Controller
{
    public function index()
    {
        $solusis = Solusi::with('kerusakan')
            ->orderBy('kode_solusi', 'asc')
            ->get();

        return view('admin.solusi.index', compact('solusis'));
    }

    public function create()
    {
        $kerusakans = Kerusakan::orderBy('kode_kerusakan', 'asc')->get();
        return view('admin.solusi.create', compact('kerusakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_solusi'       => 'required|string|max:20|unique:solusi,kode_solusi',
            'kode_kerusakan'    => 'required|exists:kerusakan,kode_kerusakan',
            'deskripsi_solusi'  => 'required|string|max:2000',
        ]);

        Solusi::create([
            'kode_solusi'      => $request->kode_solusi,
            'kode_kerusakan'   => $request->kode_kerusakan,
            'deskripsi_solusi' => $request->deskripsi_solusi,
        ]);

        return redirect()->route('admin.solusi.index')
            ->with('message', 'Solusi berhasil ditambahkan');
    }

    public function edit(string $kode_solusi)
    {
        $solusi = Solusi::findOrFail($kode_solusi);
        $kerusakans = Kerusakan::orderBy('kode_kerusakan', 'asc')->get();
        return view('admin.solusi.edit', compact('solusi', 'kerusakans'));
    }

    public function update(Request $request, string $kode_solusi)
    {
        $solusi = Solusi::findOrFail($kode_solusi);

        $request->validate([
            'kode_solusi'       => 'required|string|max:20|unique:solusi,kode_solusi,' . $solusi->kode_solusi . ',kode_solusi',
            'kode_kerusakan'    => 'required|exists:kerusakan,kode_kerusakan',
            'deskripsi_solusi'  => 'required|string|max:2000',
        ]);

        $solusi->update([
            'kode_solusi'      => $request->kode_solusi,
            'kode_kerusakan'   => $request->kode_kerusakan,
            'deskripsi_solusi' => $request->deskripsi_solusi,
        ]);

        return redirect()->route('admin.solusi.index')
            ->with('message', 'Solusi berhasil diperbarui');
    }

    public function destroy(string $kode_solusi)
    {
        $solusi = Solusi::findOrFail($kode_solusi);
        $solusi->delete();

        return redirect()->route('admin.solusi.index')
            ->with('message', 'Solusi berhasil dihapus');
    }
}
