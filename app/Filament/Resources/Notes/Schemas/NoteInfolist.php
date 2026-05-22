<?php

namespace App\Filament\Resources\Notes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NoteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('judul'),
                TextEntry::make('keterangan')
                    ->placeholder('-'),
                TextEntry::make('input')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
