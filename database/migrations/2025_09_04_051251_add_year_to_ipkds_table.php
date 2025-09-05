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
    Schema::table('ipkds', function (Blueprint $table) {
        $table->string('year')->nullable()->after('judul');
    });
}

public function down(): void
{
    Schema::table('ipkds', function (Blueprint $table) {
        $table->dropColumn('year');
    });
}

};
