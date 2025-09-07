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
    Schema::create('visi_misis', function (Blueprint $table) {
    $table->id();
    $table->enum('type', ['visi', 'misi']); // membedakan antara visi dan misi
    $table->string('title');
    $table->text('description');
    $table->string('icon')->nullable(); // hanya untuk misi, untuk svg icon
    $table->string('color')->nullable(); // hanya untuk misi
    $table->timestamps();
});

}


    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::table('visi_misis', function (Blueprint $table) {
            if (Schema::hasColumn('visi_misis', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });
    }
};
