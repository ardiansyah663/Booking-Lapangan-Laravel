<?php

// app/Filament/Pages/Dashboard.php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';
    
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?int $navigationSort = 1;

    public function getColumns(): int | string | array
    {
        return [
            'md' => 2,
            'xl' => 4,
        ];
    }

    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\FieldStatsWidget::class,
            \App\Filament\Widgets\DailySummaryWidget::class,
            \App\Filament\Widgets\FieldCategoryChartWidget::class,
            \App\Filament\Widgets\MonthlyTrendWidget::class,
            \App\Filament\Widgets\PopularFieldsWidget::class,
            \App\Filament\Widgets\RecentActivityWidget::class,
        ];
    }
}