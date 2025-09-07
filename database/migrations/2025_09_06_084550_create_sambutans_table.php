<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sambutans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_bupati')->comment('Nama Bupati atau pejabat terkait');
            $table->string('jabatan')->default('Bupati Jepara')->comment('Jabatan resmi');
            $table->string('foto')->nullable()->comment('Path atau URL foto Bupati');
            $table->longText('isi_sambutan')->comment('Isi sambutan lengkap');
            $table->timestamps(); // created_at & updated_at otomatis
            $table->softDeletes()->comment('Tanggal penghapusan data (soft delete)'); // opsional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sambutans');
    }
};
