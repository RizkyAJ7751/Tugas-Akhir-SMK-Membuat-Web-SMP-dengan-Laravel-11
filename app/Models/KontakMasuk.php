<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakMasuk extends Model
{
    use HasFactory;

    protected $table = 'kontak_masuk';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
