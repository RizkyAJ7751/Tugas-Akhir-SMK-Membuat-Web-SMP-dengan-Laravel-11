<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Program;
use App\Models\Stats;


class HomeController extends Controller
{
    public function index()
    {
        $kepalaSekolah = KepalaSekolah::first();
        $gurus = Guru::latest()->take(6)->get();
        $stats = Stats::getStats();

        // ✅ hanya ambil yang statusnya published
        $beritas = Berita::where('status', 'published')
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(3)
            ->get();
        return view('welcome', compact('kepalaSekolah', 'gurus', 'beritas', 'stats'));
    }

    public function beritaIndex()
    {
        $beritas = Berita::where('status', 'published')
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(9);
        return view('components.blog-index', compact('beritas'));
    }
    public function beritaShow($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        return view('components.blog-show', compact('berita'));
    }

    public function teachers()
    {
        return view('components.teachers');
    }
    public function teachersIndex()
    {
        $gurus = Guru::paginate(10);
        return view('components.teacher-index', compact('gurus'));
        // return $gurus;
    }
    // di HomeController.php
    public function programs()
    {
        $programs = Program::all();
        return view('components.programs', compact('programs'));
    }
}
