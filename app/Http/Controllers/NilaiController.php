<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('nilais.kriteria')->get();
        $kriterias = Kriteria::all();
        $ranking = $this->hitungSMART();
        return view('nilai.index', compact('mahasiswas', 'kriterias', 'ranking'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::updateOrCreate(
            ['mahasiswa_id' => $validated['mahasiswa_id'], 'kriteria_id' => $validated['kriteria_id']],
            ['nilai' => $validated['nilai']]
        );

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }

    public function hitungUlang()
    {
        return redirect()->route('nilai.index')->with('success', 'Perhitungan SMART berhasil diperbarui.');
    }

    private function hitungSMART()
    {
        $mahasiswas = Mahasiswa::all();
        $kriterias = Kriteria::all();

        if ($kriterias->isEmpty() || $mahasiswas->isEmpty()) {
            return collect();
        }

        $maxNilai = [];
        foreach ($kriterias as $kriteria) {
            $maxNilai[$kriteria->id] = Nilai::where('kriteria_id', $kriteria->id)->max('nilai') ?: 1;
        }

        $results = [];
        foreach ($mahasiswas as $mahasiswa) {
            $totalSkor = 0;
            $detail = [];

            foreach ($kriterias as $kriteria) {
                $nilai = Nilai::where('mahasiswa_id', $mahasiswa->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->first();

                $nilaiVal = $nilai ? $nilai->nilai : 0;
                $normalisasi = $maxNilai[$kriteria->id] > 0 ? $nilaiVal / $maxNilai[$kriteria->id] : 0;
                $bobotNormal = $kriteria->bobot / 100;
                $skor = $normalisasi * $bobotNormal;
                $totalSkor += $skor;

                $detail[] = [
                    'kriteria' => $kriteria->nama,
                    'nilai' => $nilaiVal,
                    'normalisasi' => $normalisasi,
                    'bobot' => $kriteria->bobot,
                    'skor' => $skor,
                ];
            }

            $results[] = [
                'mahasiswa' => $mahasiswa,
                'total_skor' => $totalSkor,
                'detail' => $detail,
            ];
        }

        usort($results, fn($a, $b) => $b['total_skor'] <=> $a['total_skor']);

        return collect($results);
    }
}
