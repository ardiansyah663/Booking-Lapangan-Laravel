<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use App\Models\FieldImage;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditField extends EditRecord
{
    protected static string $resource = FieldResource::class;

    protected function afterSave(): void
    {
        $record = $this->record;
        $data = $this->form->getState();

        if (isset($data['images']) && is_array($data['images'])) {
            // Delete old images from storage and database
            foreach ($record->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            // Save new images
            foreach ($data['images'] as $imagePath) {
                FieldImage::create([
                    'field_id' => $record->id,
                    'image_path' => $imagePath,
                ]);
            }
        }
    }
}