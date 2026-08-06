<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama', 255);
            $table->string('jurusan', 255)->nullable();
            $table->string('angkatan', 10)->nullable();
            $table->decimal('ipk', 3, 2)->default(0);
            $table->decimal('penghasilan', 12, 2)->default(0);
            $table->string('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
