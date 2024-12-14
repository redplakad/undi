<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Enums\IconPosition;

use App\Models\PesertaTabungan;
use App\Models\KuponTabungan;


class UndianTabunganStats extends BaseWidget
{
    protected static ?string $pollingInterval = '2s';
    protected function getStats(): array
    {
        $total_saldo_undian = PesertaTabungan::sum('saldo_akhir');
        $totalPeserta = PesertaTabungan::count();
        $totalKupon = KuponTabungan::count();

        return [
            //
            Stat::make('Peserta Tabungan', number_format($totalPeserta))
                ->description('Peserta Undian Tabungan')
                ->descriptionIcon('heroicon-c-user-group', IconPosition::Before)
                ->color('success'),
            Stat::make('Kupon Tabungan', number_format($totalKupon))
                ->description('Jumlah Kupon Undian Tabungan')
                ->descriptionIcon('heroicon-m-arrow-trending-down', IconPosition::Before)
                ->color('info'),
            Stat::make('Total Saldo Tabungan', number_format($total_saldo_undian))
                ->description('Total Saldo Tabungan Yang Diundi')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->color('warning'),
            ];
    }
}
