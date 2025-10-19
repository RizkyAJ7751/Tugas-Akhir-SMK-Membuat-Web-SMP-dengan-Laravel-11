<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Program;


class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::orderBy("created_at", "desc")->paginate(10);
        return view("admin.guru.index", compact("gurus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Batasi maksimal 6 guru
        return view("admin.guru.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string|max:255",
            "jabatan" => "required|string|max:255",
            "bidang" => "nullable|string|max:255",
            "foto" => "required|image|mimes:jpeg,png,jpg|max:2048",
        ], [
            "nama.required" => "Nama guru wajib diisi",
            "nama.max" => "Nama tidak boleh lebih dari 255 karakter",
            "jabatan.required" => "Jabatan wajib diisi",
            "foto.required" => "Foto guru wajib diupload",
            "foto.image" => "File harus berupa gambar",
            "foto.mimes" => "Format gambar harus JPEG, PNG, atau JPG",
            "foto.max" => "Ukuran gambar maksimal 2MB"
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file("foto");
            $filename = 'guru_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $fotoPath = $file->storeAs("guru", $filename, "public");
        }

        Guru::create([
            'nama'   => $request->nama,
            'jabatan' => $request->jabatan,
            'bidang' => $request->bidang,
            'foto'   => $fotoPath,
            'urutan' => 1,
            'is_active' => true,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view("admin.guru.edit", compact("guru"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            "nama" => "required|string|max:255",
            "jabatan" => "required|string|max:255",
            "bidang" => "nullable|string|max:255",
            "foto" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $data = $request->only(['nama', 'jabatan', 'bidang']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $file = $request->file("foto");
            $filename = 'guru_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $data['foto'] = $file->storeAs("guru", $filename, "public");
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        // Hapus foto kalau ada
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus');
    }

     public function dimas(Request $request, $id)
    {

        dd('masuk update');
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'gelombang'   => 'required|in:1,2,3',
            'brosur.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $program = Program::findOrFail($id);

        // selalu pastikan brosurPaths adalah array
        $brosurPaths = $program->brosur ?? [];

        // tambahkan brosur baru kalau ada
        if ($request->hasFile('brosur')) {
            foreach ($request->file('brosur') as $index => $file) {
                if (count($brosurPaths) >= 5) break; // maksimal 5
                $brosurPaths[] = $file->store('programs', 'public');
            }
        }

        $program->update([
            'title'       => $request->title,
            'description' => $request->description,
            'gelombang'   => $request->gelombang,
            'brosur'      => $brosurPaths,
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui.');
    }
}
