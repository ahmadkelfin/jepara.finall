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
        // Buat tabel 'layanans' jika belum ada
        if (!Schema::hasTable('layanans')) {
            Schema::create('layanans', function (Blueprint $table) {
                $table->id();
                $table->string('judul')->comment('Judul layanan'); 
                $table->string('deskripsi')->nullable()->comment('Deskripsi singkat layanan');
                $table->string('icon')->nullable()->comment('Path icon atau gambar layanan');
                $table->string('link')->nullable()->comment('URL tujuan layanan');
                $table->string('url')->nullable();
                $table->string('ikon')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'layanans' jika ada
        if (Schema::hasTable('layanans')) {
            Schema::dropIfExists('layanans');
        }
    }
};
