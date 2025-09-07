<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sejarahs', function (Blueprint $table) {
    $table->id();
    $table->string('judul');       // Judul per bagian
    $table->text('isi');           // Konten sejarah
    $table->string('gambar')->nullable(); // Gambar pendukung
    $table->integer('urutan')->default(0); // Buat ngatur posisi
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarahs');
    }
};
