<?php

namespace App\Http\Controllers\User;

use function auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Riwayat;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kerusakan;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $riwayats = Riwayat::where('user_id', $user->user_id)->latest()->get();
        $testimonis = Testimoni::where('user_id', $user->user_id)->latest()->get();

        $editTestimoni = null;
        if ($request->has('edit')) {
            $editId = $request->query('edit');
            $editTestimoni = Testimoni::where('testimoni_id', $editId)
                ->where('user_id', $user->user_id)
                ->first();
        }

        return view('user.profile.index', compact('user', 'riwayats', 'testimonis', 'editTestimoni'));
    }

    public function edit()
    {
        $user = Auth::user();
        $riwayats = Riwayat::where('user_id', $user->user_id)
                    ->orderBy('tanggal_diagnosa', 'desc')
                    ->get();

        $testimonis = Testimoni::where('user_id', $user->user_id)->latest()->get();

        $editTestimoni = null;

        return view('user.profile.index', compact('user', 'riwayats', 'testimonis', 'editTestimoni'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => [
            'required',
            'regex:/^[A-Za-z ]+$/',
            'max:255',
        ],
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'pekerjaan' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.regex' => 'Nama hanya boleh berisi huruf, tanpa angka atau simbol.'
        ]);

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('user-profile'), $filename);

            // Hapus foto lama jika ada
            if ($user->foto_profil && file_exists(public_path($user->foto_profil))) {
                unlink(public_path($user->foto_profil));
            }

            $user->foto_profil = 'user-profile/' . $filename;
        }

        // Update data lainnya
        $user->name = $request->name;
        $user->email = $request->email;
        $user->pekerjaan = $request->pekerjaan;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'Password lama tidak sesuai'])
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success_password', 'Password berhasil diubah');
    }

    public function download($riwayat_id)
    {
        $riwayat = Riwayat::where('riwayat_id', $riwayat_id)
            ->where('user_id', Auth::user()->user_id)
            ->firstOrFail();

        $filename = 'riwayat_diagnosa_' . $riwayat->riwayat_id . '.txt';
        $content = "Hasil Diagnosa:\n" . $riwayat->hasil_diagnosa . "\n\n"
                . "Solusi:\n" . $riwayat->solusi_diagnosa . "\n\n"
                . "Jumlah Solusi: " . $riwayat->jumlah_solusi . "\n"
                . "Tanggal Diagnosa: " . $riwayat->tanggal_diagnosa;

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename={$filename}"
        ]);
    }

    public function downloadPdf($riwayat_id)
    {
        $riwayat = Riwayat::where('riwayat_id', $riwayat_id)
            ->where('user_id', Auth::user_id())
            ->firstOrFail();

        $hasil = collect(json_decode($riwayat->hasil_diagnosa, true))
            ->sortByDesc('nilai')
            ->take(3)
            ->values()
            ->toArray();

        $colors = ['#667eea', '#764ba2', '#f093fb'];
        foreach ($hasil as $i => &$item) {
            $item['color'] = $colors[$i] ?? '#ccc';
        }

        $topKerusakan = Kerusakan::where('kode_kerusakan', $hasil[0]['kode'] ?? null)->first();
        $solusi = $topKerusakan ? $topKerusakan->solusis()->get() : collect([]);

        $result = [
            'judul' => 'Hasil Diagnosa Kerusakan Komputer',
            'deskripsi' => 'Berikut adalah 3 kemungkinan kerusakan tertinggi.',
            'hasil' => $hasil,
            'kerusakan_tertinggi' => $topKerusakan,
            'solusi' => $solusi,
        ];

        return Pdf::loadView('diagnosis.result-pdf', compact('result'))
            ->download('riwayat-diagnosa-'.$riwayat_id.'.pdf');
    }
}
