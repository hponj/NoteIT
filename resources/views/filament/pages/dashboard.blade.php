<x-filament-panels::page>
    @php
        $user = auth()->user();
        $isAdmin = $user?->isAdmin();
        $latestNotes = $this->getLatestNotes();
    @endphp

    <style>
        .mood-dashboard {
            display: grid;
            gap: 32px;
        }

        .mood-hero {
            position: relative;
            overflow: hidden;
            border-radius: 34px;
            padding: 32px;
            background: linear-gradient(135deg, #fff7d6 0%, #fff 48%, #ffe7c2 100%);
            border: 1px solid rgba(217, 119, 6, .18);
            box-shadow: 0 18px 50px rgba(15, 23, 42, .08);
        }

        .mood-hero::before,
        .mood-hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            filter: blur(34px);
            opacity: .65;
        }

        .mood-hero::before {
            width: 170px;
            height: 170px;
            right: -42px;
            top: -46px;
            background: #fbbf24;
        }

        .mood-hero::after {
            width: 140px;
            height: 140px;
            left: 180px;
            bottom: -58px;
            background: #fb923c;
        }

        .mood-hero-inner {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .mood-welcome {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .mood-logo-note {
            width: 84px;
            height: 84px;
            display: grid;
            place-items: center;
            border-radius: 26px;
            background: #f59e0b;
            box-shadow: 0 18px 36px rgba(245, 158, 11, .25);
            transform: rotate(-4deg);
            font-size: 42px;
        }

        .mood-eyebrow {
            margin: 0;
            font-size: 13px;
            font-weight: 800;
            color: #b45309;
        }

        .mood-title {
            margin: 4px 0 0;
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1;
            letter-spacing: -.05em;
            color: #0f172a;
            font-weight: 950;
        }

        .mood-subtitle {
            max-width: 620px;
            margin: 12px 0 0;
            color: #64748b;
            line-height: 1.7;
            font-size: 14px;
        }

        .mood-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 999px;
            padding: 13px 20px;
            background: #ea580c;
            color: white;
            font-weight: 900;
            box-shadow: 0 16px 28px rgba(234, 88, 12, .22);
            transition: .2s ease;
            white-space: nowrap;
        }

        .mood-button:hover {
            transform: translateY(-2px);
            background: #c2410c;
            color: white;
        }

        .mood-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .mood-card {
            position: relative;
            overflow: hidden;
            min-height: 180px;
            border-radius: 30px;
            padding: 26px;
            background: white;
            border: 1px solid rgba(148, 163, 184, .22);
            box-shadow: 0 16px 38px rgba(15, 23, 42, .07);
        }

        .mood-card::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -50px;
            bottom: -50px;
            border-radius: 999px;
            background: rgba(251, 191, 36, .16);
        }

        .mood-card-head {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .mood-card-label {
            margin: 0;
            color: #64748b;
            font-size: 14px;
            font-weight: 850;
        }

        .mood-card-icon {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 18px;
            background: #fff7ed;
            font-size: 22px;
        }

        .mood-number {
            position: relative;
            z-index: 1;
            margin: 26px 0 0;
            color: #020617;
            font-size: clamp(44px, 6vw, 72px);
            line-height: .9;
            letter-spacing: -.06em;
            font-weight: 950;
        }

        .mood-card-text {
            position: relative;
            z-index: 1;
            margin: 16px 0 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .mood-motivation {
            background: linear-gradient(160deg, #fef3c7, #fff7ed);
        }

        .mood-motivation-text {
            position: relative;
            z-index: 1;
            margin: 24px 0 0;
            color: #111827;
            font-size: 24px;
            line-height: 1.25;
            letter-spacing: -.04em;
            font-weight: 950;
        }

        .mood-section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 16px;
        }

        .mood-section-title {
            margin: 0;
            color: #0f172a;
            font-size: 24px;
            line-height: 1.1;
            letter-spacing: -.04em;
            font-weight: 950;
        }

        .mood-section-subtitle {
            margin: 8px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .mood-link {
            color: #ea580c;
            font-weight: 900;
            text-decoration: none;
            white-space: nowrap;
        }

        .mood-notes-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .mood-note {
            position: relative;
            min-height: 210px;
            border-radius: 26px;
            padding: 28px 24px 22px;
            background: #fef3c7;
            color: #111827;
            box-shadow: 0 18px 34px rgba(15, 23, 42, .08);
            border: 1px solid rgba(217, 119, 6, .16);
            transition: .2s ease;
        }

        .mood-note:nth-child(2n) {
            background: #dbeafe;
            transform: rotate(1.2deg);
        }

        .mood-note:nth-child(3n) {
            background: #fce7f3;
            transform: rotate(-1.1deg);
        }

        .mood-note:hover {
            transform: translateY(-4px) rotate(0deg);
            box-shadow: 0 26px 44px rgba(15, 23, 42, .12);
        }

        .mood-note-pin {
            position: absolute;
            top: 12px;
            left: 50%;
            width: 54px;
            height: 10px;
            transform: translateX(-50%);
            border-radius: 999px;
            background: rgba(255, 255, 255, .72);
        }

        .mood-note-title {
            margin: 12px 0 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            color: #0f172a;
            font-size: 20px;
            line-height: 1.15;
            letter-spacing: -.04em;
            font-weight: 950;
        }

        .mood-note-body {
            margin: 14px 0 0;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            color: #475569;
            line-height: 1.65;
            font-size: 14px;
        }

        .mood-note-footer {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            margin-top: 22px;
            color: #64748b;
            font-size: 12px;
            font-weight: 800;
        }

        .mood-empty {
            border-radius: 30px;
            padding: 42px;
            text-align: center;
            background: rgba(255, 247, 237, .65);
            border: 2px dashed rgba(245, 158, 11, .35);
        }

        .mood-empty-icon {
            font-size: 54px;
        }

        .mood-empty-title {
            margin: 14px 0 0;
            color: #0f172a;
            font-size: 22px;
            font-weight: 950;
        }

        .mood-empty-text {
            margin: 8px 0 0;
            color: #64748b;
        }

        .dark .mood-hero {
            background: linear-gradient(135deg, #1f2937 0%, #111827 55%, #431407 100%);
            border-color: rgba(245, 158, 11, .22);
        }

        .dark .mood-title,
        .dark .mood-section-title,
        .dark .mood-empty-title {
            color: white;
        }

        .dark .mood-card {
            background: #111827;
            border-color: rgba(148, 163, 184, .12);
        }

        .dark .mood-number,
        .dark .mood-motivation-text {
            color: white;
        }

        .dark .mood-note {
            background: #422006;
            border-color: rgba(245, 158, 11, .2);
        }

        .dark .mood-note:nth-child(2n) {
            background: #172554;
        }

        .dark .mood-note:nth-child(3n) {
            background: #500724;
        }

        .dark .mood-note-title {
            color: white;
        }

        .dark .mood-note-body {
            color: #cbd5e1;
        }

        .dark .mood-empty {
            background: rgba(67, 20, 7, .25);
            border-color: rgba(245, 158, 11, .25);
        }

        @media (max-width: 1100px) {
            .mood-stats,
            .mood-notes-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .mood-hero-inner,
            .mood-welcome,
            .mood-section-head {
                align-items: stretch;
                flex-direction: column;
            }

            .mood-stats,
            .mood-notes-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="mood-dashboard">
        <section class="mood-hero">
            <div class="mood-hero-inner">
                <div class="mood-welcome">
                    <div class="mood-logo-note">📝</div>
                    <div>
                        <p class="mood-eyebrow">Selamat datang kembali</p>
                        <h2 class="mood-title">{{ $user->name }}</h2>
                        <p class="mood-subtitle">
                            {{ $isAdmin ? 'Pantau semua pengguna dan seluruh catatan dari satu dashboard yang lebih hidup.' : 'Kelola catatanmu sendiri dengan rapi, ringan, dan tidak terasa seperti dashboard kantor yang kaku.' }}
                        </p>
                    </div>
                </div>

                <a href="{{ \App\Filament\Resources\Notes\NoteResource::getUrl('create') }}" class="mood-button">Tambah Catatan</a>
            </div>
        </section>

        <section class="mood-stats">
            @if ($isAdmin)
                <div class="mood-card">
                    <div class="mood-card-head">
                        <p class="mood-card-label">Total User</p>
                        <span class="mood-card-icon">👥</span>
                    </div>
                    <p class="mood-number">{{ number_format($this->getUserCount()) }}</p>
                    <p class="mood-card-text">Seluruh akun yang terdaftar di aplikasi.</p>
                </div>

                <div class="mood-card">
                    <div class="mood-card-head">
                        <p class="mood-card-label">Total Catatan</p>
                        <span class="mood-card-icon">📚</span>
                    </div>
                    <p class="mood-number">{{ number_format($this->getNoteCount()) }}</p>
                    <p class="mood-card-text">Semua catatan dari semua user.</p>
                </div>
            @else
                <div class="mood-card">
                    <div class="mood-card-head">
                        <p class="mood-card-label">Catatan Saya</p>
                        <span class="mood-card-icon">📒</span>
                    </div>
                    <p class="mood-number">{{ number_format($this->getNoteCount()) }}</p>
                    <p class="mood-card-text">Jumlah catatan yang sudah kamu buat.</p>
                </div>
            @endif

            <div class="mood-card">
                <div class="mood-card-head">
                    <p class="mood-card-label">Catatan Hari Ini</p>
                    <span class="mood-card-icon">🌱</span>
                </div>
                <p class="mood-number">{{ number_format($this->getTodayNoteCount()) }}</p>
                <p class="mood-card-text">Catatan baru yang dibuat hari ini.</p>
            </div>

            <div class="mood-card mood-motivation">
                <div class="mood-card-head">
                    <p class="mood-card-label">Motivasi Harian</p>
                    <span class="mood-card-icon">✨</span>
                </div>
                <p class="mood-motivation-text">{{ $this->getMotivation() }}</p>
            </div>
        </section>

        <section class="mood-dashboard">
            <div class="mood-section-head">
                <div>
                    <h3 class="mood-section-title">Catatan Terbaru</h3>
                    <p class="mood-section-subtitle">Preview dibuat seperti sticky notes agar dashboard terasa seperti aplikasi catatan.</p>
                </div>
                <a href="{{ \App\Filament\Resources\Notes\NoteResource::getUrl() }}" class="mood-link">Lihat semua</a>
            </div>

            @if ($latestNotes->isEmpty())
                <div class="mood-empty">
                    <div class="mood-empty-icon">🗒️</div>
                    <h4 class="mood-empty-title">Belum ada catatan</h4>
                    <p class="mood-empty-text">Mulai buat catatan pertama agar dashboard ini lebih hidup.</p>
                </div>
            @else
                <div class="mood-notes-grid">
                    @foreach ($latestNotes as $note)
                        <a href="/dashboard/notes/{{ $note->id }}" class="note-card">
                        <article class="mood-note">
                            <div class="mood-note-pin"></div>
                            <h4 class="mood-note-title">{{ $note->judul }}</h4>
                            <p class="mood-note-body">{{ $note->keterangan ?: $note->input }}</p>
                            <div class="mood-note-footer">
                                <span>{{ $isAdmin ? $note->user?->name : 'Punya saya' }}</span>
                                <span>{{ $note->created_at?->diffForHumans() }}</span>
                            </div>
                        </article>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</x-filament-panels::page>
