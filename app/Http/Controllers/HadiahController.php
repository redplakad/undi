<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use Illuminate\Http\Request;

class HadiahController extends Controller
{
    public function index()
    {
        $hadiah = Hadiah::paginate(20);
        return view('hadiah.index', compact('hadiah'));
    }

    public function create()
    {
        return view('hadiah.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_hadiah' => 'required|string|max:255',
            'stok_hadiah' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'keterangan' => 'nullable|string',
            'level' => 'required|integer',
        ]);

        // Menyimpan file foto
        $path = $request->file('foto')->store('uploads/hadiah', 'public');

        // Membuat entri baru di database
        Hadiah::create([
            'nama_hadiah' => $request->nama_hadiah,
            'stok_hadiah' => $request->stok_hadiah,
            'foto' => $path, // Menyimpan path foto
            'keterangan' => $request->keterangan,
            'level' => $request->level,
        ]);

        return redirect()->back()->with('success', 'Hadiah berhasil ditambahkan.');
    }

    public function show($id)
    {
        $hadiah = Hadiah::findOrFail($id);
        return view('hadiah.show', compact('hadiah'));
    }

    public function edit($id)
    {
        $hadiah = Hadiah::findOrFail($id);
        return view('hadiah.edit', compact('hadiah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hadiah' => 'required',
            'stok_hadiah' => 'required|integer',
            'foto' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'level' => 'required|integer',
        ]);

        $hadiah = Hadiah::findOrFail($id);
        $hadiah->update($request->all());
        return redirect()->route('hadiah.index')->with('success', 'Hadiah updated successfully.');
    }

    public function destroy($id)
    {
        $hadiah = Hadiah::findOrFail($id);
        $hadiah->delete();
        return redirect()->route('hadiah.index')->with('success', 'Hadiah deleted successfully.');
    }
}
