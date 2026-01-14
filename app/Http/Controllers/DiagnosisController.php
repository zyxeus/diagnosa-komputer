<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Proses;
use App\Models\Riwayat;

class DiagnosisController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::orderBy('kode_gejala')->get();
        return view('diagnosis.diagnosis', compact('gejalas'));
    }

    public function process(Request $request)
    {
        $selectedGejalas = $request->input('gejala', []);
        $userCFs = $request->input('cf', []);

        if (empty($selectedGejalas)) {
            return redirect()->route('diagnosis.index')
                ->with('error', 'Silakan pilih minimal satu gejala.');
        }

        $hasilCF = [];
        $kerusakans = Kerusakan::all();

        foreach ($kerusakans as $kerusakan) {
            $aturanList = Proses::where('kode_kerusakan', $kerusakan->kode_kerusakan)
                ->whereIn('kode_gejala', $selectedGejalas)
                ->get();

            $cfCombine = 0;

            foreach ($aturanList as $aturan) {
                $index = array_search($aturan->kode_gejala, $selectedGejalas);
                $cfUser = $userCFs[$index] ?? 1;
                $cfFinal = $aturan->nilai_cf * $cfUser;

                $cfCombine = $cfCombine == 0
                    ? $cfFinal
                    : $cfCombine + ($cfFinal * (1 - $cfCombine));
            }

            $hasilCF[] = [
                'kode'      => $kerusakan->kode_kerusakan,
                'kerusakan' => $kerusakan->nama_kerusakan,
                'nilai'     => round($cfCombine * 100, 2),
            ];
        }

        usort($hasilCF, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

        // SIMPAN KE RIWAYAT
        $riwayat = Riwayat::create([
            'user_id'          => Auth::id(),
            'hasil_diagnosa'   => json_encode($hasilCF),
            'solusi_diagnosa'  => json_encode([]),
            'jumlah_solusi'    => 0,
            'tanggal_diagnosa' => now(),
        ]);

        return redirect()->route('diagnosis.result', $riwayat->riwayat_id);
    }

    public function result($riwayat_id)
    {
        $riwayat = Riwayat::where('riwayat_id', $riwayat_id)->firstOrFail();

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

        return view('diagnosis.result', compact('result', 'riwayat'));
    }

    public function generatePdf($riwayat_id)
    {
        $riwayat = Riwayat::where('riwayat_id', $riwayat_id)->firstOrFail();

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
            ->download('hasil-diagnosa-my-pc.pdf');
    }
}
