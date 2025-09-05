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
        // Hanya drop kolom 'konten' jika ada
        if (Schema::hasColumn('beritas', 'konten')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->dropColumn('konten');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hanya tambahkan kolom 'konten' jika belum ada
        if (!Schema::hasColumn('beritas', 'konten')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->text('konten')->nullable()->comment('Konten berita sebelumnya');
            });
        }
    }
};
