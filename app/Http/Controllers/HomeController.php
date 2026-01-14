<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::where('status', 'tampil')
            ->latest()
            ->take(6)
            ->get();

        return view('home.index', compact('testimonis'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function diagnosis()
    {
        return view('home.diagnosis');
    }

    public function information()
    {
        return view('home.information');
    }
}
