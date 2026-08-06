<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::latest()->get();
        $totalBobot = Kriteria::sum('bobot');
        return view('kriteria.index', compact('kriterias', 'totalBobot'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:100',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $totalBobot = Kriteria::sum('bobot') + $validated['bobot'];
        if ($totalBobot > 100) {
            return back()->with('error', 'Total bobot tidak boleh melebihi 100%');
        }

        Kriteria::create($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:100',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $totalBobot = Kriteria::where('id', '!=', $kriteria->id)->sum('bobot') + $validated['bobot'];
        if ($totalBobot > 100) {
            return back()->with('error', 'Total bobot tidak boleh melebihi 100%');
        }

        $kriteria->update($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
