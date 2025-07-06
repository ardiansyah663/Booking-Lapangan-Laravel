<?php

namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\TableWidget;
use Filament\Tables;
use Filament\Tables\Table;

class PopularFieldsWidget extends TableWidget
{
    protected static ?string $heading = 'Lapangan Populer';
        protected int | string | array $columnSpan = 'full';


    public function table(Table $table): Table
    {
        return $table
            ->query(Field::query()->withCount('bookings')->orderBy('bookings_count', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lapangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Sepak Bola' => 'success',
                        'Futsal' => 'info',
                        'Badminton' => 'warning',
                        'Basket' => 'danger',
                        'Tenis' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->limit(20),
                Tables\Columns\TextColumn::make('price_per_hour')
                    ->label('Harga/Jam')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('bookings_count')
                    ->label('Total Booking')
                    ->badge()
                    ->color('success'),
            ])
            ->actions([
            ]);
    }
}