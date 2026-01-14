<?php

namespace App\Http\Controllers\User;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::where('user_id', Auth::id())->first();

        return view('user.testimoni', [
            'testimoni' => $testimoni,
            'editTestimoni' => null
        ]);
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->testimonis()->exists()) {
            return redirect()->back()->with('message', 'Kamu sudah pernah mengirim testimoni.');
        }

        $request->validate([
            'isi_testimoni' => 'required|string|max:200',
        ]);

        $user->testimonis()->create([
            'isi_testimoni' => $request->isi_testimoni,
        ]);

        return redirect()->back()->with('message', 'Testimoni berhasil dikirim.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::where('user_id', Auth::id())->findOrFail($id);
        return view('user.profile.edit-testimoni', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi_testimoni' => 'required|string|max:200',
        ]);

        $testimoni = Testimoni::where('user_id', Auth::id())->findOrFail($id);
        $testimoni->update([
            'isi_testimoni' => $request->isi_testimoni, 
            'status' => 'arsip',
            'tanggal_input' => now(),
        ]);
        
        return redirect('/user/profile')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::where('user_id', Auth::id())->findOrFail($id);
        $testimoni->delete();

        return back()->with('message', 'Testimoni berhasil dihapus.');
    }
}
