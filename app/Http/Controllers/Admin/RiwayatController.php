<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::with('user')->latest()->get();
        return view('admin.riwayat.index', compact('riwayats'));
    }

    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        return back()->with('message', 'Riwayat berhasil dihapus.');
    }
}
