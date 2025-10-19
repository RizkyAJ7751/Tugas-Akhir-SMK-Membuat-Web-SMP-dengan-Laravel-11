<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KepalaSekolahController extends Controller
{
    /**
     * Tampilkan data kepala sekolah (hanya 1).
     */
    public function index()
    {
        $kepalaSekolah = KepalaSekolah::first();
        return view("admin.kepala_sekolah.index", compact("kepalaSekolah"));
    }

    /**
     * Form tambah kepala sekolah (jika belum ada).
     */
    public function create()
    {
        // kalau sudah ada data kepala sekolah, langsung alihkan ke index
        if (KepalaSekolah::exists()) {
            return redirect()->route("admin.kepala-sekolah.index")
                ->with("error", "Data Kepala Sekolah sudah ada. Silakan edit saja.");
        }

        return view("admin.kepala_sekolah.create");
    }

    /**
     * Simpan data kepala sekolah (sekali saja).
     */
    public function store(Request $request)
    {
        if (KepalaSekolah::exists()) {
            return redirect()->route("admin.kepala-sekolah.index")
                ->with("error", "Data Kepala Sekolah sudah ada. Silakan edit saja.");
        }

        $request->validate([
            "nama" => "required|string|max:255",
            "sambutan" => "required|string|min:10",
            "foto" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $data = $request->only("nama", "sambutan");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = 'kepala_sekolah_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $data["foto"] = $file->storeAs("kepala_sekolah", $filename, "public");
        }

        KepalaSekolah::create($data);

        return redirect()->route("admin.kepala-sekolah.index")
            ->with("success", "Data Kepala Sekolah berhasil ditambahkan.");
    }


    /**
     * Form edit data kepala sekolah.
     */
    public function edit()
    {
        $kepalaSekolah = KepalaSekolah::firstOrFail();
        return view("admin.kepala_sekolah.edit", compact("kepalaSekolah"));
    }

    /**
     * Update data kepala sekolah.
     */
    public function update(Request $request, $id)
    {
        $kepalaSekolah = KepalaSekolah::findOrFail($id);

        $request->validate([
            "nama" => "required|string|max:255",
            "sambutan" => "required|string|min:10",
            "foto" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $kepalaSekolah->nama = $request->nama;
        $kepalaSekolah->sambutan = $request->sambutan;

        if ($request->hasFile("foto")) {
            // Hapus foto lama
            if ($kepalaSekolah->foto && Storage::disk("public")->exists($kepalaSekolah->foto)) {
                Storage::disk("public")->delete($kepalaSekolah->foto);
            }

            // Simpan foto baru
            $path = $request->file("foto")->store("kepala_sekolah", "public");
            $kepalaSekolah->foto = $path;
        }

        $kepalaSekolah->save();

        return redirect()->route("admin.kepala-sekolah.index")
            ->with("success", "Data Kepala Sekolah berhasil diperbarui.");
    }

    /**
     * Hapus data kepala sekolah.
     */
    public function destroy(KepalaSekolah $kepalaSekolah)
    {
        if ($kepalaSekolah->foto && Storage::disk("public")->exists($kepalaSekolah->foto)) {
            Storage::disk("public")->delete($kepalaSekolah->foto);
        }

        $kepalaSekolah->delete();

        return redirect()->route("admin.kepala-sekolah.index")
            ->with("success", "Data Kepala Sekolah berhasil dihapus.");
    }
}
