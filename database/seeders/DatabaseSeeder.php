<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Notes',
            'email' => 'admin@email.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $user = User::create([
            'name' => 'User Notes',
            'email' => 'user@email.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);

        Note::create([
            'user_id' => $admin->id,
            'judul' => 'Ide dashboard lucu',
            'keterangan' => 'Buat UI catatan yang ringan dan rapi',
            'input' => 'Gunakan warna hangat, kartu rounded, dan teks yang nyaman dibaca.',
        ]);

        Note::create([
            'user_id' => $user->id,
            'judul' => 'Belajar Laravel',
            'keterangan' => 'CRUD note pribadi',
            'input' => 'User hanya boleh melihat catatan miliknya sendiri.',
        ]);
    }
}
