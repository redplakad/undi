<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Enums\IconPosition;

use App\Models\PesertaDeposito;
use App\Models\KuponDeposito;


class UndianDepositoStats extends BaseWidget
{
    protected static ?string $pollingInterval = '2s';
    protected function getStats(): array
    {
        $total_saldo_undian = PesertaDeposito::sum('saldo_akhir');
        $totalPeserta = PesertaDeposito::count();
        $totalKupon = KuponDeposito::count();

        return [
            //
            Stat::make('Peserta Deposito', number_format($totalPeserta))
                ->description('Peserta Undian Deposito')
                ->descriptionIcon('heroicon-c-user-group', IconPosition::Before)
                ->color('success'),
            Stat::make('Kupon Deposito', number_format($totalKupon))
                ->description('Jumlah Kupon Undian Deposito')
                ->descriptionIcon('heroicon-m-arrow-trending-down', IconPosition::Before)
                ->color('info'),
            Stat::make('Total Saldo Deposito', number_format($total_saldo_undian))
                ->description('Total Saldo Deposito Yang Diundi')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->color('warning'),
            ];
    }
}
