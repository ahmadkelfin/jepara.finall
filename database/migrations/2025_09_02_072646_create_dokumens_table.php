<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();

            // Judul dokumen
            $table->string('judul', 255)->index();

            // Path atau nama file (bisa PDF, Excel, dll.)
            $table->string('file', 500);

            // Jenis dokumen (opsional, contoh: laporan, surat, dll.)
            $table->string('kategori', 100)->nullable();

            // Tambahan deskripsi dokumen (opsional)
            $table->text('deskripsi')->nullable();

            // Waktu dibuat & diupdate otomatis
            $table->timestamps();

            // Soft delete biar bisa dipulihkan kalau terhapus
            $table->softDeletes();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
