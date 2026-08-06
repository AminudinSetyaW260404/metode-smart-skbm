<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('deskripsi')->nullable();
            $table->decimal('bobot', 5, 2)->default(0);
            $table->enum('tipe', ['benefit', 'cost'])->default('benefit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
