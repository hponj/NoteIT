<x-layouts.main title="Login Mood Notes">
    <main class="auth-shell">
        <a href="/" class="brand-pill auth-brand">
            <span class="brand-emoji">✦</span>
            <span>Mood Notes</span>
        </a>

        <section class="auth-card">
            <div class="auth-heading">
                <span>Welcome back</span>
                <h1>Masuk ke catatanmu</h1>
                <p>Lanjutkan menulis ide kecil yang nanti bisa jadi hal besar.</p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="auth-form">
                @csrf
                <label>
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <small>{{ $message }}</small> @enderror
                </label>

                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                    @error('password') <small>{{ $message }}</small> @enderror
                </label>

                <label class="check-row">
                    <input type="checkbox" name="remember" value="1">
                    <span>Ingat saya</span>
                </label>

                <button type="submit">Login</button>
            </form>

            <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Create account</a></p>
        </section>
    </main>
</x-layouts.main>
