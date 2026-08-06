<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalKriteria = Kriteria::count();
        $totalNilai = Nilai::count();
        $mahasiswaBaru = Mahasiswa::latest()->take(5)->get();

        return view('dashboard', compact('totalMahasiswa', 'totalKriteria', 'totalNilai', 'mahasiswaBaru'));
    }
}
