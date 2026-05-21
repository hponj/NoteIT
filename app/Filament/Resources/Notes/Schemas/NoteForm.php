<?php

namespace App\Filament\Resources\Notes\Schemas;

use Filament\Forms\Components\Hidden;
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
                    ->label('Pemilik')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->default(fn (): ?int => auth()->id())
                    ->required()
                    ->visible(fn (): bool => auth()->user()?->isAdmin() ?? false),
                Hidden::make('user_id')
                    ->default(fn (): ?int => auth()->id())
                    ->visible(fn (): bool => ! (auth()->user()?->isAdmin() ?? false)),
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('keterangan')
                    ->label('Keterangan')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('input')
                    ->label('Isi Catatan')
                    ->rows(8)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
