<?php
namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FieldStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalFields = Field::count();
        $totalRevenue = Field::sum('price_per_hour') * 24 * 30; // Estimasi per bulan
        $avgPrice = Field::avg('price_per_hour');

        return [
            Stat::make('Total Lapangan', $totalFields)
                ->description('Jumlah semua lapangan')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),

            Stat::make('Potensi Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Per bulan (estimasi)')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('warning'),
                
            Stat::make('Rata-rata Harga', 'Rp ' . number_format($avgPrice, 0, ',', '.'))
                ->description('Per jam')
                ->descriptionIcon('heroicon-m-calculator')
                ->color('primary'),
        ];
    }
}