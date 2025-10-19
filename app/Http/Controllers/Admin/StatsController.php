<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = Stats::getStats();
        return view("admin.stats.index", compact("stats"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $stats = Stats::getStats();
        return view("admin.stats.edit", compact("stats"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "siswa_aktif" => "required|integer|min:0",
            "tenaga_pengajar" => "required|integer|min:0",
            "tahun_berdiri" => "required|string|max:4",
            "akreditasi" => "required|string|max:1"
        ]);

        $stats = Stats::getStats();
        $stats->update($request->all());

        return redirect()->route("admin.stats.index")->with("success", "Statistik berhasil diperbarui.");
    }
    public function destroy()
    {
        $stats = Stats::getStats();
        if ($stats) {
            $stats->update([
                "siswa_aktif" => 0,
                "tenaga_pengajar" => 0,
                "tahun_berdiri" => 0,
                "akreditasi" => 0,
            ]);
        }
        return redirect()->route("admin.stats.index")
            ->with("success", "Statistik berhasil dikosongkan.");
    }
}
