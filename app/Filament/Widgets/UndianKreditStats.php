<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Enums\IconPosition;

use App\Models\PesertaKredit;
use App\Models\KuponKredit;


class UndianKreditStats extends BaseWidget
{
    protected static ?string $pollingInterval = '2s';
    protected function getStats(): array
    {
        $total_saldo_undian = PesertaKredit::sum('saldo_akhir');
        $totalPeserta = PesertaKredit::count();
        $totalKupon = KuponKredit::count();

        return [
            //
            Stat::make('Peserta Kredit', number_format($totalPeserta))
                ->description('Peserta Undian Kredit')
                ->descriptionIcon('heroicon-c-user-group', IconPosition::Before)
                ->color('success'),
            Stat::make('Kupon Kredit', number_format($totalKupon))
                ->description('Jumlah Kupon Undian Kredit')
                ->descriptionIcon('heroicon-m-arrow-trending-down', IconPosition::Before)
                ->color('info'),
            Stat::make('Total Saldo Kredit', number_format($total_saldo_undian))
                ->description('Total Saldo Kredit Yang Diundi')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->color('warning'),
            ];
    }
}
