<?php

namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\ChartWidget;

class FieldCategoryChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Lapangan per Kategori';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $categories = Field::join('categories', 'fields.category_id', '=', 'categories.id')
            ->selectRaw('categories.name as category, COUNT(*) as count')
            ->groupBy('categories.name')
            ->get()
            ->toArray();

        return [
            'labels' => array_column($categories, 'category'),
            'datasets' => [
                [
                    'label' => 'Jumlah Lapangan',
                    'data' => array_column($categories, 'count'),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                    ],
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Jumlah Lapangan',
                    ],
                ],
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Kategori',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
        ];
    }
}
