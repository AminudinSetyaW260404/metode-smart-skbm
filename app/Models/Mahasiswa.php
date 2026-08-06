<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nim', 'nama', 'jurusan', 'angkatan', 'ipk', 'penghasilan', 'alamat', 'no_telepon'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
