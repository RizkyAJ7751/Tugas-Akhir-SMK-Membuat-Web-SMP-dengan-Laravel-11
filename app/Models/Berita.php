<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'tanggal_publikasi',
        'status'
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];

    /**
     * Boot method untuk auto-delete file
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-delete file ketika record dihapus
        static::deleting(function ($berita) {
            if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
                Storage::delete('public/' . $berita->gambar);
            }
        });
    }

    /**
     * Get published berita
     */
    public static function getPublishedBerita()
    {
        return self::where('status', 'published')
                    ->orderBy('tanggal_publikasi', 'desc')
                    ->get();
    }

    /**
     * Get latest berita
     */
    public static function getLatestBerita($limit = 3)
    {
        return self::where('status', 'published')
                    ->orderBy('tanggal_publikasi', 'desc')
                    ->limit($limit)
                    ->get();
    }

    /**
     * Get gambar URL
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return null;
    }

    /**
     * Get konten singkat
     */
    public function getKontenSingkatAttribute()
    {
        return Str::limit(strip_tags($this->konten), 150);
    }
}


