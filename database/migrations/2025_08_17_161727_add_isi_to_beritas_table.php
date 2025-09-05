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
        // Cek apakah kolom 'isi' belum ada sebelum menambahkan
        if (!Schema::hasColumn('beritas', 'isi')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->text('isi')->after('judul')->comment('Isi berita'); // menambahkan kolom isi setelah judul
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hanya drop jika kolom 'isi' ada
        if (Schema::hasColumn('beritas', 'isi')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->dropColumn('isi');
            });
        }
    }
};
