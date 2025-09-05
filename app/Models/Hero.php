<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'heroes';

    // Kolom yang boleh diisi via mass assignment
    protected $fillable = [
        'title',
        'subtitle',
        'image',  // bisa simpan path file
    ];
}
