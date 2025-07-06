<?php
namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class MonthlyTrendWidget extends ChartWidget
{
    protected static ?string $heading = 'Tren Lapangan 12 Bulan Terakhir';
    
    protected function getData(): array
    {
        $months = [];
        $data = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            
            $count = Field::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
                
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Lapangan',
                    'data' => $data,
                    'borderColor' => 'rgb(59, 130, 246)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}