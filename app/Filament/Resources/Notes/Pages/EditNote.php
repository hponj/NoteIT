<?php

namespace App\Filament\Resources\Notes\Pages;

use App\Filament\Resources\Notes\NoteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNote extends EditRecord
{
    protected static string $resource = NoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (! auth()->user()?->isAdmin()) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }
}
