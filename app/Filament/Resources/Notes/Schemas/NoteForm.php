<?php

namespace App\Filament\Resources\Notes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class NoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->visible(auth()->user()->role === 'super_admin'),
                TextInput::make('judul')
                    ->required(),
                TextInput::make('keterangan')
                    ->default(null),
                Textarea::make('input')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
