<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sambutans', function (Blueprint $table) {
            $table->id();

            // Judul sambutan
            $table->string('judul')->index();

            // Nama pejabat (misalnya Bupati, Wakil, dll)
            $table->string('pejabat')->nullable();

            // Isi sambutan
            $table->longText('isi');

            // Foto atau gambar pejabat
            $table->string('foto')->nullable();

            // Status tayang (draft / published)
            $table->enum('status', ['draft', 'published'])->default('draft');

            $table->timestamps();
            $table->softDeletes(); // bisa dihapus sementara
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sambutans');
    }
};
