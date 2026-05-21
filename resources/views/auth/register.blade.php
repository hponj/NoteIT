<x-layouts.main title="Create Account Mood Notes">
    <main class="auth-shell">
        <a href="/" class="brand-pill auth-brand">
            <span class="brand-emoji">✦</span>
            <span>Mood Notes</span>
        </a>

        <section class="auth-card">
            <div class="auth-heading">
                <span>Hello writer</span>
                <h1>Buat akun baru</h1>
                <p>Akun user otomatis dibuat dengan role user dan langsung masuk dashboard.</p>
            </div>

            <form method="POST" action="{{ route('register.store') }}" class="auth-form">
                @csrf
                <label>
                    <span>Nama</span>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name') <small>{{ $message }}</small> @enderror
                </label>

                <label>
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <small>{{ $message }}</small> @enderror
                </label>

                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                    @error('password') <small>{{ $message }}</small> @enderror
                </label>

                <label>
                    <span>Konfirmasi Password</span>
                    <input type="password" name="password_confirmation" required>
                </label>

                <button type="submit">Create Account</button>
            </form>

            <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        </section>
    </main>
</x-layouts.main>
