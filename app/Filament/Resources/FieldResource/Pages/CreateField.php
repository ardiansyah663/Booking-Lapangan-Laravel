<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use App\Models\FieldImage;
use Filament\Resources\Pages\CreateRecord;

class CreateField extends CreateRecord
{
    protected static string $resource = FieldResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;
        $data = $this->form->getState();

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $imagePath) {
                FieldImage::create([
                    'field_id' => $record->id,
                    'image_path' => $imagePath,
                ]);
            }
        }
    }
}