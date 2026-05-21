# Catatan Filament

Aplikasi catatan berbasis Laravel dan Filament.

## Akun bawaan

Admin:
Email: admin@email.com
Password: password123

User:
Email: user@email.com
Password: password123

## Cara menjalankan

composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve

Buka landing page:
http://127.0.0.1:8000

Buka dashboard:
http://127.0.0.1:8000/dashboard

## Catatan setup

Project ini tidak wajib menjalankan npm run dev untuk membuka landing page karena CSS landing sudah memakai public/assets/app.css.

Jika ingin mengedit CSS dari resources, jalankan:
npm install
npm run build
