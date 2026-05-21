<x-layouts.main title="Mood Notes">
    <main class="page-shell">
        <nav class="topbar">
            <a href="/" class="brand-pill">
                <span class="brand-emoji">✦</span>
                <span>Mood Notes</span>
            </a>
            <div class="nav-actions">
                <a href="{{ route('login') }}" class="ghost-link">Login</a>
                <a href="{{ route('register') }}" class="primary-link">Create Account</a>
            </div>
        </nav>

        <section class="hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">Catatan web yang ringan, rapi, dan manis</div>
                <h1>Tulis ide, tugas, dan hal penting tanpa ribet.</h1>
                <p>Mood Notes dibuat dengan Laravel dan Filament. Admin bisa mengatur user dan semua note, sementara user hanya mengelola note miliknya sendiri.</p>
                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="big-button">Mulai Menulis</a>
                    <a href="{{ route('login') }}" class="soft-button">Masuk Dashboard</a>
                </div>
            </div>

            <div class="note-preview">
                <div class="floating-star">☁</div>
                <article class="sticky-note yellow-note">
                    <span>Today</span>
                    <h3>Meeting kecil</h3>
                    <p>Review tugas, cek prioritas, lalu lanjut eksekusi.</p>
                </article>
                <article class="sticky-note pink-note">
                    <span>Idea</span>
                    <h3>UI lucu</h3>
                    <p>Kartu rounded, warna lembut, tetap profesional.</p>
                </article>
                <article class="sticky-note blue-note">
                    <span>Private</span>
                    <h3>Note aman</h3>
                    <p>User hanya melihat catatan miliknya sendiri.</p>
                </article>
            </div>
        </section>
    </main>
</x-layouts.main>
