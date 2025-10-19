<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $table = 'kepala_sekolah';

    protected $fillable = [
        'nama',
        'sambutan',
        'foto',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Boot method untuk auto-delete file
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-delete file ketika record dihapus
        static::deleting(function ($kepalaSekolah) {
            if ($kepalaSekolah->foto && Storage::exists('public/' . $kepalaSekolah->foto)) {
                Storage::delete('public/' . $kepalaSekolah->foto);
            }
        });
    }

    /**
     * Get active kepala sekolah
     */
    public static function getActiveKepalaSekolah()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return null;
    }

    /**
     * Get nama lengkap dengan gelar
     */
    public function getNamaLengkapAttribute()
    {
        return $this->nama;
    }
}
