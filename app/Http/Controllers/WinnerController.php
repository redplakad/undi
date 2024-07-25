<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use App\Models\Voucher;
use App\Models\Hadiah;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;


class WinnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $winners = Winner::with(['voucher', 'prize', 'region'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('voucher', function ($query) use ($search) {
                    $query->where('no_rek', 'like', "%{$search}%");
                })->orWhereHas('prize', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('region', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(10);
    
        return view('winners.index', compact('winners', 'search'));
    }

    public function create()
    {
        // Ambil semua ID dari vouchers yang sudah ada di winners
        $existingVoucherIds = Peserta::pluck('NOREK')->toArray();

        // Ambil data voucher yang belum ada di winners secara acak
        $peserta = Peserta::whereNotIn('id', $existingVoucherIds)
                        ->inRandomOrder()
                        ->first();
        $prizes = Hadiah::where('stok_hadiah', '>', 0)->get();
        $regions = Peserta::distinct()->pluck('kota');;
        return view('winners.create', compact('prizes', 'regions','peserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'voucher_id' => 'required',
            'prize_id' => 'required|exists:prizes,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        Winner::create($request->all());

        return redirect()->route('winners.index')->with('success', 'Winner created successfully.');
    }

    public function show(Winner $winner)
    {
        return view('winners.show', compact('winner'));
    }

    public function edit(Winner $winner)
    {
        return view('winners.edit', compact('winner'));
    }

    public function update(Request $request, Winner $winner)
    {
        $request->validate([
            'voucher_id' => 'required|exists:vouchers,id',
            'prize_id' => 'required|exists:prizes,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $winner->update($request->all());

        return redirect()->route('winners.index')->with('success', 'Winner updated successfully.');
    }

    public function destroy(Winner $winner)
    {
        $winner->delete();

        return redirect()->route('winners.index')->with('success', 'Winner deleted successfully.');
    }

    public function getFotoBySlug($slug)
    {
        // Mengambil hadiah berdasarkan slug yang diberikan
        $hadiah = Hadiah::where('id', $slug)->first();

        // Memeriksa apakah hadiah ditemukan
        if ($hadiah) {
            // Mengembalikan respons JSON dengan kolom foto
            return response()->json([
                'success' => true,
                'foto' => Storage::url($hadiah->foto),
            ]);
        } else {
            // Mengembalikan respons JSON jika hadiah tidak ditemukan
            return response()->json([
                'success' => false,
                'message' => 'Hadiah tidak ditemukan.',
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
