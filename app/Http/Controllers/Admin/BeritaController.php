<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy("tanggal_publikasi", "desc")->paginate(10);
        return view("admin.berita.index", compact("beritas"));
    }

    public function create()
    {
        return view("admin.berita.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required|string|max:255",
            "slug" => "required|string|unique:berita,slug|max:255",
            "konten" => "required|string",
            "gambar" => "required|mimetypes:image/jpeg,image/png|max:5120",
            "tanggal_publikasi" => "required|date",
            "status" => "required|in:draft,published",
        ], [
            "judul.required" => "Judul berita wajib diisi",
            "judul.max" => "Judul tidak boleh lebih dari 255 karakter",
            "slug.required" => "Slug wajib diisi",
            "slug.unique" => "Slug sudah digunakan, coba judul lain atau edit slug secara manual",
            "slug.max" => "Slug tidak boleh lebih dari 255 karakter",
            "konten.required" => "Konten berita wajib diisi",
            "gambar.required" => "Gambar utama berita wajib diupload",
            "gambar.image" => "File harus berupa gambar",
            "gambar.mimes" => "Format gambar harus JPEG, PNG, atau JPG",
            "gambar.max" => "Ukuran gambar maksimal 5MB",
            "tanggal_publikasi.required" => "Tanggal publikasi wajib diisi",
            "tanggal_publikasi.date" => "Format tanggal tidak valid",
            "status.required" => "Status publikasi wajib dipilih",
            "status.in" => "Status publikasi tidak valid",
        ]);

        $data = $request->only(["judul", "slug", "konten", "tanggal_publikasi", "status"]);

        if ($request->hasFile("gambar")) {
            $file = $request->file("gambar");
            $filename = Str::slug($request->judul) . "_" . time() . "." . $file->getClientOriginalExtension();
            $data["gambar"] = $file->storeAs("berita", $filename, "public");
        }

        Berita::create($data);

        return redirect()->route("admin.berita.index")->with("success", "Berita berhasil ditambahkan.");
    }

    public function edit(Berita $berita)
    {
        return view("admin.berita.edit", compact("berita"));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            "judul" => "required|string|max:255",
            "slug" => "required|string|max:255|unique:berita,slug," . $berita->id,
            "konten" => "required|string",
            "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:5120",
            "tanggal_publikasi" => "required|date",
            "status" => "required|in:draft,published",
        ], [
            "judul.required" => "Judul berita wajib diisi",
            "judul.max" => "Judul tidak boleh lebih dari 255 karakter",
            "slug.required" => "Slug wajib diisi",
            "slug.unique" => "Slug sudah digunakan, coba judul lain atau edit slug secara manual",
            "slug.max" => "Slug tidak boleh lebih dari 255 karakter",
            "konten.required" => "Konten berita wajib diisi",
            "gambar.image" => "File harus berupa gambar",
            "gambar.mimes" => "Format gambar harus JPEG, PNG, atau JPG",
            "gambar.max" => "Ukuran gambar maksimal 5MB",
            "tanggal_publikasi.required" => "Tanggal publikasi wajib diisi",
            "tanggal_publikasi.date" => "Format tanggal tidak valid",
            "status.required" => "Status publikasi wajib dipilih",
            "status.in" => "Status publikasi tidak valid",
        ]);

        $data = $request->only(["judul", "slug", "konten", "tanggal_publikasi", "status"]);
        if ($request->hasFile("gambar")) {
            // Hapus gambar lama kalau ada
            if ($berita->gambar && Storage::disk("public")->exists($berita->gambar)) {
                Storage::disk("public")->delete($berita->gambar);
            }
            // Upload gambar baru
            $file = $request->file("gambar");
            $filename = Str::slug($request->judul) . "_" . time() . "." . $file->getClientOriginalExtension();
            $data["gambar"] = $file->storeAs("berita", $filename, "public");
        }
        // Simpan perubahan
        $berita->update($data);
        return redirect()->route("admin.berita.index")->with("success", "Berita berhasil diperbarui.");
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk("public")->exists($berita->gambar)) {
            Storage::disk("public")->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->route("admin.berita.index")
            ->with("success", "Berita berhasil dihapus.");
    }
}
