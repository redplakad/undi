<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari input
        $search = $request->input('search');

        // Mengambil data peserta dengan pagination dan pencarian
        $peserta = Peserta::when($search, function ($query, $search) {
            return $query->where('NOREK', 'like', "%{$search}%")
                         ->orWhere('NAMA', 'like', "%{$search}%")
                         ->orWhere('KOTA', 'like', "%{$search}%");
        })->paginate(30);

        // Mengembalikan view 'peserta.index' dengan data peserta dan kata kunci pencarian
        return view('peserta.index', compact('peserta', 'search'));
    }

    public function create()
    {
        return view('peserta.create'); // Mengembalikan view untuk membuat peserta baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'NOREK' => 'required|string|max:255',
            'NAMA' => 'required|string|max:255',
            'KOTA' => 'required|string|max:255',
            'NO_IDENTITAS' => 'required|string|max:255',
            'JENIS_PRODUK' => 'required|string|max:255',
        ]);

        $peserta = Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta created successfully!'); // Redirect ke index setelah menyimpan
    }

    public function show($id)
    {
        $peserta = Peserta::findOrFail($id); // Menggunakan findOrFail untuk menangani jika peserta tidak ditemukan
        return view('peserta.show', compact('peserta')); // Mengembalikan view untuk menampilkan peserta
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id); // Menggunakan findOrFail untuk menangani jika peserta tidak ditemukan
        return view('peserta.edit', compact('peserta')); // Mengembalikan view untuk mengedit peserta
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NOREK' => 'required|string|max:255',
            'NAMA' => 'required|string|max:255',
            'KOTA' => 'required|string|max:255',
            'NO_IDENTITAS' => 'required|string|max:255',
            'JENIS_PRODUK' => 'required|string|max:255',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta updated successfully!'); // Redirect ke index setelah memperbarui
    }

    public function destroy($id)
    {
        Peserta::destroy($id);
        return redirect()->route('peserta.index')->with('success', 'Peserta deleted successfully!'); // Redirect ke index setelah menghapus
    }
}