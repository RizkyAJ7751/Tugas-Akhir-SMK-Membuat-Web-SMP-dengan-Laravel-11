<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats';

    protected $fillable = [
        'siswa_aktif',
        'tenaga_pengajar',
        'tahun_berdiri',
        'akreditasi'
    ];

    protected $casts = [
        'siswa_aktif' => 'integer',
        'tenaga_pengajar' => 'integer',
    ];

    /**
     * Get the first stats record or create a default one
     */
    public static function getStats()
    {
        return self::first() ?? self::create([
            'siswa_aktif' => 0,
            'tenaga_pengajar' => 0,
            'tahun_berdiri' => '2024',
            'akreditasi' => 'A'
        ]);
    }
}
