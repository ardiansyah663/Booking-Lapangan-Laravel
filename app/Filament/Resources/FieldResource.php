<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FieldResource\Pages;
use App\Models\Field;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('price_per_hour')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('images')
                    ->multiple()
                    ->directory('field-images')
                    ->disk('public')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                    ->maxFiles(5)
                    ->enableReordering(),
            ])
            ->statePath('data')
            ->model(Field::class);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->columns([
    Tables\Columns\ImageColumn::make('images')
        ->label('Gambar')
        ->getStateUsing(function (Field $record) {
            if (!$record->images || $record->images->isEmpty()) {
                return null;
            }
            
            $firstImage = $record->images->first();
            $imagePath = $firstImage->image_path ?? $firstImage->path ?? null;
            
            if (!$imagePath) {
                return null;
            }
            
            // Return path lengkap dari storage
 return url('storage/field-images/' . basename($imagePath));
                })
        ->disk('public')
        ->size(100),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lapangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_per_hour')
                    ->label('Harga per Jam')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFields::route('/'),
            'create' => Pages\CreateField::route('/create'),
            'edit' => Pages\EditField::route('/{record}/edit'),
        ];
    }
}