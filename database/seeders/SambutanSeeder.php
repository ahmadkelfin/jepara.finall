<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SambutanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sambutans')->insert([
            'judul' => 'Sambutan Kepala Desa',
            'isi' => 'Selamat datang di website resmi desa Jepara.',
            'penulis' => 'Kepala Desa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
