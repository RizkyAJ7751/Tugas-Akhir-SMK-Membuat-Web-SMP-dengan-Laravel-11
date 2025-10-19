<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontakMasuk;

class KontakMasukController extends Controller
{
    public function index()
    {
        $kontaks = KontakMasuk::orderBy("created_at", "desc")->paginate(10);
        return view("admin.kontak.index", compact("kontaks"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email',
            'telepon' => 'nullable|regex:/^[0-9+\-\s]+$/|max:20',
            'subjek'  => 'required|string|max:100',
            'pesan'   => 'required|string|max:2000',
        ]);

        KontakMasuk::create($validated);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function show(KontakMasuk $kontak_masuk)
    {
        return view('admin.kontak.show', [
            'kontak' => $kontak_masuk
        ]);
    }


    public function destroy($id)
    {
        $kontak = KontakMasuk::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak-masuk.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
