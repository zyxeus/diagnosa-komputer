<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Import model sesuai tabel
use App\Models\User;
use App\Models\Admin;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Riwayat;
use App\Models\Testimoni;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $totalUser      = User::count();
        $totalAdmin     = Admin::count();
        $totalGejala    = Gejala::count();
        $totalKerusakan = Kerusakan::count();
        $totalRiwayat   = Riwayat::count();

        $testimoni = Testimoni::where('status', 'tampil')
                                ->latest()
                                ->take(5)
                                ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalAdmin',
            'totalGejala',
            'totalKerusakan',
            'totalRiwayat',
            'testimoni'
        ));
    }
}
