<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function index()
    {
        $prizes = Prize::paginate(10);
        return view('prizes.index', compact('prizes'));
    }

    public function create()
    {
        return view('prizes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Prize::create($request->all());

        return redirect()->route('prizes.index')->with('success', 'Prize created successfully.');
    }

    public function show(Prize $prize)
    {
        return view('prizes.show', compact('prize'));
    }

    public function edit(Prize $prize)
    {
        return view('prizes.edit', compact('prize'));
    }

    public function update(Request $request, Prize $prize)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $prize->update($request->all());

        return redirect()->route('prizes.index')->with('success', 'Prize updated successfully.');
    }

    public function destroy(Prize $prize)
    {
        $prize->delete();

        return redirect()->route('prizes.index')->with('success', 'Prize deleted successfully.');
    }
}
