<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakans = Kerusakan::orderBy('kode_kerusakan')->get();
        return view('admin.kerusakan.index', compact('kerusakans'));
    }

    public function create()
    {
        return view('admin.kerusakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kerusakan' => 'required|unique:kerusakan,kode_kerusakan',
            'nama_kerusakan' => 'required',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['kode_kerusakan','nama_kerusakan','deskripsi']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/kerusakan'), $filename);
            $data['gambar'] = $filename;
        }

        Kerusakan::create($data);

        return redirect()->route('admin.kerusakan.index')
            ->with('message','Kerusakan berhasil ditambahkan');
    }

    public function edit(Kerusakan $kerusakan)
    {
        return view('admin.kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, Kerusakan $kerusakan)
    {
        $request->validate([
            'kode_kerusakan' => 'required|unique:kerusakan,kode_kerusakan,' . $kerusakan->kode_kerusakan . ',kode_kerusakan',
            'nama_kerusakan' => 'required',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['kode_kerusakan','nama_kerusakan','deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($kerusakan->gambar && file_exists(public_path('images/kerusakan/' . $kerusakan->gambar))) {
                unlink(public_path('images/kerusakan/' . $kerusakan->gambar));
            }

            $file = $request->file('gambar');
            $filename = date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/kerusakan'), $filename);
            $data['gambar'] = $filename;
        }

        $kerusakan->update($data);

        return redirect()->route('admin.kerusakan.index')
            ->with('message','Kerusakan berhasil diperbarui');
    }

    public function destroy(Kerusakan $kerusakan)
    {
        if ($kerusakan->gambar && file_exists(public_path('images/kerusakan/' . $kerusakan->gambar))) {
            unlink(public_path('images/kerusakan/' . $kerusakan->gambar));
        }

        $kerusakan->delete();

        return redirect()->route('admin.kerusakan.index')
            ->with('message','Kerusakan berhasil dihapus');
    }
}
