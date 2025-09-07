<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    protected $table = 'sejarahs'; // pastikan nama tabel benar

    protected $fillable = [
        'judul',
        'gambar',
        'isi',
        'urutan',
    ];
}
