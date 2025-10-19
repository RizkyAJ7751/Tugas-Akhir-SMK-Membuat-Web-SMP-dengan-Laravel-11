<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);

        // kalau brosur disimpan json, decode dulu
        $program->brosur = is_array($program->brosur)
            ? $program->brosur
            : json_decode($program->brosur, true);

        return view('programs.show', compact('program'));
    }


    public function create()
    {
        $programs = Program::all(); // ambil semua program
        return view('admin.programs.create', compact('programs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'gelombang'   => 'required|in:1,2,3',
            'brosur.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // store()
        $brosurPaths = [];
        foreach ($request->file('brosur', []) as $index => $file) {
            if ($index >= 5) break;
            $brosurPaths[$index] = $file->store('programs', 'public');
        }


        Program::create([
            'title'       => $request->title,
            'description' => $request->description,
            'gelombang'   => $request->gelombang,
            'brosur'      => $brosurPaths,
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->brosur) {
            foreach ($program->brosur as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus');
    }
}
