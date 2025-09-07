<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional, kalau tabelmu bukan 'galeris')
     */
    protected $table = 'galeris';

    /**
     * Kolom yang bisa diisi mass-assignment
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];

    /**
     * Default casting (optional, untuk format otomatis)
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
