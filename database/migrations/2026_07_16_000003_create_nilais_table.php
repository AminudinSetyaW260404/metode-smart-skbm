<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kriteria_id')->constrained()->cascadeOnDelete();
            $table->decimal('nilai', 5, 2)->default(0);
            $table->timestamps();
            $table->unique(['mahasiswa_id', 'kriteria_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
