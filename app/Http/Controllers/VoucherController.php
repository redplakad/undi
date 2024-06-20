<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use League\Csv\Reader;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $vouchers = Voucher::where(function ($query) use ($search) {
            $query->where('no_rek', 'like', '%' . $search . '%')
                ->orWhere('no_kupon', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->orWhere('area', 'like', '%' . $search . '%')
                ->orWhere('plafon', 'like', '%' . $search . '%');
        })->paginate(30);
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        $voucher = new Voucher($request->all());
        $voucher->save();

        return redirect('/vouchers');
    }

    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $voucher->update($request->all());
        return redirect('/vouchers');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect('/vouchers');
    }

    public function showImportForm()
    {
        return view('vouchers.import'); // Sesuaikan dengan nama file view Anda
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        $reader = Reader::createFromPath($file->getPathname(), 'r');
        $reader->setDelimiter('|'); // Set delimiter '|' untuk file CSV
        $reader->setHeaderOffset(0);

        foreach ($reader as $row) {
            Voucher::create([
                'no_rek' => $row['NO_REK'],
                'no_kupon' => $row['NO_KUPON'],
                'nama' => $row['NAMA'],
                'area' => $row['AREA'],
                'plafon' => $row['PLAFON'],
                'kelipatan_plafon' => $row['KELIPATAN_PLAFON'],
                'kelipatan_topup' => $row['KELIPATAN_TOPUP'],
                'jumlah_kupon' => $row['JUMLAH_KUPON'],
                'tgl_buka' => $row['TGL_BUKA'],
                'tgl_jt' => $row['TGL_JT'],
                'kab_kota' => $row['KAB_KOTA'],
            ]);
        }

        return redirect('/vouchers');
    }
}
