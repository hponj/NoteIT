<?php

namespace App\Filament\Resources\Notes\Pages;

use App\Filament\Resources\Notes\NoteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNote extends ViewRecord
{
    protected static string $resource = NoteResource::class;

    protected string $view = 'filament.pages.resources.notes.pages.view-note';

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}