<x-filament-panels::page>
    <style>
        .note-view-wrapper {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }

        .note-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #fff3b0 0%, #fff7df 45%, #ffffff 100%);
            border: 1px solid rgba(245, 158, 11, 0.22);
            border-radius: 34px;
            padding: 36px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.10);
        }

        .note-hero::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -55px;
            top: -60px;
            background: rgba(251, 146, 60, 0.25);
            border-radius: 999px;
        }

        .note-hero::after {
            content: "📝";
            position: absolute;
            right: 42px;
            bottom: 28px;
            font-size: 74px;
            opacity: 0.16;
        }

        .note-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.82);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.18);
            border-radius: 999px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
        }

        .note-title {
            position: relative;
            z-index: 2;
            margin-top: 22px;
            max-width: 780px;
            font-size: 52px;
            line-height: 1.05;
            font-weight: 950;
            color: #09090b;
            letter-spacing: -0.04em;
        }

        .note-description {
            position: relative;
            z-index: 2;
            margin-top: 18px;
            max-width: 760px;
            font-size: 21px;
            line-height: 1.75;
            color: #4b5563;
        }

        .note-meta {
            position: relative;
            z-index: 2;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .note-meta-item {
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 999px;
            padding: 10px 15px;
            font-size: 14px;
            color: #6b7280;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
        }

        .notepad {
            margin-top: 32px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 34px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.10);
        }

        .notepad-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f9fafb;
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            padding: 18px 28px;
        }

        .notepad-dots {
            display: flex;
            gap: 8px;
        }

        .notepad-dot {
            width: 12px;
            height: 12px;
            border-radius: 999px;
        }

        .dot-red {
            background: #f87171;
        }

        .dot-yellow {
            background: #fbbf24;
        }

        .dot-green {
            background: #34d399;
        }

        .notepad-label {
            font-size: 14px;
            font-weight: 800;
            color: #9ca3af;
        }

        .notepad-paper {
            position: relative;
            min-height: 420px;
            margin: 28px;
            overflow: hidden;
            background:
                linear-gradient(90deg, transparent 0, transparent 58px, rgba(248, 113, 113, 0.28) 59px, transparent 60px),
                repeating-linear-gradient(#fff8c7 0px, #fff8c7 39px, rgba(245, 158, 11, 0.28) 40px);
            border: 1px solid rgba(245, 158, 11, 0.18);
            border-radius: 26px;
            box-shadow: inset 0 4px 24px rgba(15, 23, 42, 0.06);
        }

        .notepad-paper::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 12px;
            height: 100%;
            background: #fb923c;
        }

        .note-content {
            position: relative;
            z-index: 2;
            padding: 42px 48px 42px 84px;
        }

        .note-content-label {
            margin-bottom: 18px;
            color: #ea580c;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 0.20em;
            text-transform: uppercase;
        }

        .note-content-text {
            white-space: pre-line;
            color: #1f2937;
            font-size: 21px;
            line-height: 40px;
        }

        @media (min-width: 1024px) {
            .note-view-wrapper {
                max-width: 1280px;
            }

            .note-hero {
                padding: 44px 52px;
            }

            .note-title {
                max-width: 960px;
                font-size: 60px;
            }

            .note-description {
                max-width: 920px;
                font-size: 22px;
            }

            .notepad-paper {
                min-height: 520px;
            }

            .note-content {
                padding: 52px 72px 52px 104px;
            }

            .note-content-text {
                font-size: 22px;
                line-height: 42px;
            }
        }

        @media (min-width: 1440px) {
            .note-view-wrapper {
                max-width: 1480px;
            }

            .notepad-paper {
                min-height: 580px;
            }

            .note-title {
                max-width: 1080px;
                font-size: 66px;
            }

            .note-description {
                max-width: 1040px;
                font-size: 23px;
            }

            .note-content-text {
                font-size: 23px;
                line-height: 44px;
            }
        }

        @media (max-width: 768px) {
            .note-hero {
                padding: 26px;
                border-radius: 26px;
            }

            .note-hero::after {
                right: 24px;
                bottom: 20px;
                font-size: 54px;
            }

            .note-title {
                font-size: 36px;
            }

            .note-description {
                font-size: 17px;
                line-height: 1.65;
            }

            .note-meta-item {
                width: 100%;
            }

            .notepad {
                border-radius: 26px;
            }

            .notepad-paper {
                margin: 18px;
                min-height: 360px;
                background:
                    linear-gradient(90deg, transparent 0, transparent 42px, rgba(248, 113, 113, 0.28) 43px, transparent 44px),
                    repeating-linear-gradient(#fff8c7 0px, #fff8c7 35px, rgba(245, 158, 11, 0.28) 36px);
            }

            .note-content {
                padding: 34px 28px 34px 64px;
            }

            .note-content-text {
                font-size: 18px;
                line-height: 36px;
            }
        }

        @media (max-width: 480px) {
            .note-hero {
                padding: 22px;
            }

            .note-title {
                font-size: 32px;
            }

            .note-description {
                font-size: 16px;
            }

            .notepad-topbar {
                padding: 16px 20px;
            }

            .notepad-paper {
                margin: 14px;
                border-radius: 22px;
            }

            .note-content {
                padding: 30px 22px 30px 56px;
            }

            .note-content-text {
                font-size: 17px;
                line-height: 36px;
            }
        }
    </style>

    <div class="note-view-wrapper">
        <section class="note-hero">
            <div class="note-badge">
                <span>✨</span>
                <span>Mood Notes</span>
            </div>

            <h1 class="note-title">
                {{ $record->judul }}
            </h1>

            <p class="note-description">
                {{ $record->keterangan }}
            </p>

            <div class="note-meta">
                <div class="note-meta-item">
                    Dibuat: {{ $record->created_at?->format('d M Y, H:i') }}
                </div>

                <div class="note-meta-item">
                    Update: {{ $record->updated_at?->format('d M Y, H:i') }}
                </div>
            </div>
        </section>

        <section class="notepad">
            <div class="notepad-topbar">
                <div class="notepad-dots">
                    <span class="notepad-dot dot-red"></span>
                    <span class="notepad-dot dot-yellow"></span>
                    <span class="notepad-dot dot-green"></span>
                </div>

                <div class="notepad-label">
                    Notepad View
                </div>
            </div>

            <div class="notepad-paper">
                <div class="note-content">
                    <div class="note-content-label">
                        Isi Catatan
                    </div>

                    <div class="note-content-text">
                        {{ $record->input }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-filament-panels::page>