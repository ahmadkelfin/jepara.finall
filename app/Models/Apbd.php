<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apbd extends Model
{
    protected $table = 'apbds';

    protected $fillable = [
        'title',
        'year',
        'date',
        'thumbnail',
        'file',
    ];
}
