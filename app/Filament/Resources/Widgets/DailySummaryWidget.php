<?php
namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class DailySummaryWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        
        $todayFields = Field::whereDate('created_at', $today)->count();
        $yesterdayFields = Field::whereDate('created_at', $yesterday)->count();
        
        $growth = $yesterdayFields > 0 ? (($todayFields - $yesterdayFields) / $yesterdayFields) * 100 : 0;
        
        return [
            Stat::make('Lapangan Hari Ini', $todayFields)
                ->description($growth > 0 ? "{$growth}% naik dari kemarin" : ($growth < 0 ? abs($growth) . "% turun dari kemarin" : "Sama dengan kemarin"))
                ->descriptionIcon($growth > 0 ? 'heroicon-m-arrow-trending-up' : ($growth < 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-minus'))
                ->color($growth > 0 ? 'success' : ($growth < 0 ? 'danger' : 'warning')),
                
            Stat::make('Lapangan Minggu Ini', Field::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count())
                ->description('Total minggu ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),
                
            Stat::make('Lapangan Bulan Ini', Field::whereMonth('created_at', Carbon::now()->month)->count())
                ->description('Total bulan ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
        ];
    }
}