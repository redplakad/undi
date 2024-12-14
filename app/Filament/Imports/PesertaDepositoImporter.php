<?php

namespace App\Filament\Imports;

use App\Models\PesertaDeposito;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PesertaDepositoImporter extends Importer
{
    protected static ?string $model = PesertaDeposito::class;

    public static function getColumns(): array
    {
        return [
            //
            
            ImportColumn::make('nama_nasabah')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nomor_cif')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nomor_rekening')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('jenis_deposito')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('saldo_akhir')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
            ImportColumn::make('no_ktp')
                ->requiredMapping()
                ->rules(['required', 'max:16']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?PesertaDeposito
    {
        // return PesertaDeposito::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new PesertaDeposito();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Data peserta Deposito berhasil di import dan ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' terimport.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
