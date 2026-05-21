<?php

namespace App\Filament\Pages;

use App\Models\Note;
use App\Models\User;
use Filament\Pages\Page;
use BackedEnum;
use Illuminate\Database\Eloquent\Collection;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $title = 'Dashboard';

    public function getUserCount(): int
    {
        if (! auth()->user()?->isAdmin()) {
            return 1;
        }

        return User::query()->count();
    }

    public function getNoteCount(): int
    {
        $query = Note::query();

        if (! auth()->user()?->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        return $query->count();
    }

    public function getTodayNoteCount(): int
    {
        $query = Note::query()->whereDate('created_at', now()->toDateString());

        if (! auth()->user()?->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        return $query->count();
    }

    public function getLatestNotes(): Collection
    {
        $query = Note::query()
            ->with('user:id,name,email')
            ->latest()
            ->limit(6);

        if (! auth()->user()?->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        return $query->get();
    }

    public function getMotivation(): string
    {
        $sentences = [
            'Satu catatan kecil hari ini bisa jadi ide besar besok.',
            'Tulis dulu, rapikan nanti. Yang penting idenya tidak hilang.',
            'Catatan rapi bikin pikiran lebih ringan.',
            'Hari ini cukup mulai dari satu catatan yang berguna.',
        ];

        return $sentences[now()->dayOfYear % count($sentences)];
    }
}
