<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use App\Models\Voucher;
use App\Models\Prize;
use App\Models\Region;
use Illuminate\Http\Request;

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
        $existingVoucherIds = Winner::pluck('voucher_id')->toArray();

        // Ambil data voucher yang belum ada di winners secara acak
        $voucher = Voucher::whereNotIn('id', $existingVoucherIds)
                        ->inRandomOrder()
                        ->first();
        $prizes = Prize::all();
        $regions = Region::all();
        return view('winners.create', compact('prizes', 'regions','voucher'));
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
}
