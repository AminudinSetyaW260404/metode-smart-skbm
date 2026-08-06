<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $mahasiswas = [
            ['nim' => '2024001', 'nama' => 'Ahmad Rizki', 'jurusan' => 'Teknik Informatika', 'angkatan' => '2024', 'ipk' => 3.85, 'penghasilan' => 3000000, 'alamat' => 'Jl. Merdeka No. 1', 'no_telepon' => '081234567890'],
            ['nim' => '2024002', 'nama' => 'Siti Nurhaliza', 'jurusan' => 'Sistem Informasi', 'angkatan' => '2024', 'ipk' => 3.92, 'penghasilan' => 2500000, 'alamat' => 'Jl. Sudirman No. 2', 'no_telepon' => '081234567891'],
            ['nim' => '2024003', 'nama' => 'Budi Santoso', 'jurusan' => 'Teknik Komputer', 'angkatan' => '2024', 'ipk' => 3.75, 'penghasilan' => 4000000, 'alamat' => 'Jl. Thamrin No. 3', 'no_telepon' => '081234567892'],
            ['nim' => '2024004', 'nama' => 'Dewi Lestari', 'jurusan' => 'Teknik Informatika', 'angkatan' => '2024', 'ipk' => 3.88, 'penghasilan' => 2000000, 'alamat' => 'Jl. Gatot Subroto No. 4', 'no_telepon' => '081234567893'],
            ['nim' => '2024005', 'nama' => 'Eko Prasetyo', 'jurusan' => 'Sistem Informasi', 'angkatan' => '2024', 'ipk' => 3.70, 'penghasilan' => 3500000, 'alamat' => 'Jl. Diponegoro No. 5', 'no_telepon' => '081234567894'],
        ];

        foreach ($mahasiswas as $m) {
            Mahasiswa::create($m);
        }

        $kriterias = [
            ['nama' => 'IPK', 'deskripsi' => 'Indeks Prestasi Kumulatif', 'tipe' => 'benefit', 'bobot' => 50],
            ['nama' => 'Penghasilan Orang Tua', 'deskripsi' => 'Penghasilan orang tua per bulan', 'tipe' => 'cost', 'bobot' => 30],
            ['nama' => 'Jumlah Semester', 'deskripsi' => 'Semester yang sudah ditempuh', 'tipe' => 'benefit', 'bobot' => 20],
        ];

        foreach ($kriterias as $k) {
            Kriteria::create($k);
        }

        $nilais = [
            ['mahasiswa_id' => 1, 'kriteria_id' => 1, 'nilai' => 85],
            ['mahasiswa_id' => 1, 'kriteria_id' => 2, 'nilai' => 70],
            ['mahasiswa_id' => 1, 'kriteria_id' => 3, 'nilai' => 90],
            ['mahasiswa_id' => 2, 'kriteria_id' => 1, 'nilai' => 92],
            ['mahasiswa_id' => 2, 'kriteria_id' => 2, 'nilai' => 80],
            ['mahasiswa_id' => 2, 'kriteria_id' => 3, 'nilai' => 85],
            ['mahasiswa_id' => 3, 'kriteria_id' => 1, 'nilai' => 75],
            ['mahasiswa_id' => 3, 'kriteria_id' => 2, 'nilai' => 60],
            ['mahasiswa_id' => 3, 'kriteria_id' => 3, 'nilai' => 80],
            ['mahasiswa_id' => 4, 'kriteria_id' => 1, 'nilai' => 88],
            ['mahasiswa_id' => 4, 'kriteria_id' => 2, 'nilai' => 85],
            ['mahasiswa_id' => 4, 'kriteria_id' => 3, 'nilai' => 92],
            ['mahasiswa_id' => 5, 'kriteria_id' => 1, 'nilai' => 70],
            ['mahasiswa_id' => 5, 'kriteria_id' => 2, 'nilai' => 65],
            ['mahasiswa_id' => 5, 'kriteria_id' => 3, 'nilai' => 75],
        ];

        foreach ($nilais as $n) {
            Nilai::create($n);
        }
    }
}
