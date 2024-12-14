<?php

namespace App\Filament\Exports;

use App\Models\KuponKredit;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class KuponKreditExporter extends Exporter
{
    protected static ?string $model = KuponKredit::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('noid_peserta'),
            ExportColumn::make('nomor_cif'),
            ExportColumn::make('nomor_rekening'),
            ExportColumn::make('nama_nasabah'),
            ExportColumn::make('kode_kupon'),
            ExportColumn::make('status_kredit'),
            ExportColumn::make('wilayah'),
            ExportColumn::make('status'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your kupon kredit export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
