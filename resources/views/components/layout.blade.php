<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'KelolaIn' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    <header class="app-header">
        <div class="app-header-inner">
            <a class="brand" href="{{ auth()->check() ? route('dashboard') : url('/') }}" aria-label="KelolaIn, beranda">
                <span class="brand-mark" aria-hidden="true">K</span>
                <span class="brand-copy"><strong>KelolaIn</strong><small>Catat. Pahami. Kendalikan.</small></span>
            </a>
            @auth
                <button class="mobile-nav-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false" data-nav-toggle>
                    <span></span><span></span><span></span>
                </button>
            @else
                <nav class="public-nav" aria-label="Navigasi halaman">
                    <a href="{{ route('login') }}">Masuk</a>
                    <a class="header-action" href="{{ route('register') }}">Buat akun</a>
                </nav>
            @endauth
        </div>
    </header>
    @auth
        <div class="app-frame">
            <aside class="app-sidebar" data-mobile-nav>
                <div class="sidebar-user">
                    <span class="avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}</span>
                    <span><strong>{{ auth()->user()->nama }}</strong><small>Ruang keuangan pribadi</small></span>
                </div>
                <nav class="sidebar-nav" aria-label="Navigasi utama">
                    <a class="is-active" href="{{ route('dashboard') }}"><span aria-hidden="true">⌂</span> Ringkasan</a>
                    <a href="{{ route('dashboard') }}#analitik"><span aria-hidden="true">◌</span> Analitik</a>
                    <a href="{{ route('transactions.index') }}"><span aria-hidden="true">↗</span> Transaksi</a>
                    <a href="{{ route('dashboard') }}#kategori"><span aria-hidden="true">◒</span> Kategori</a>
                </nav>
                <div class="sidebar-bottom">
                    <a href="{{ route('dashboard') }}#bantuan"><span aria-hidden="true">?</span> Bantuan</a>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"><span aria-hidden="true">↪</span> Keluar</button>
                    </form>
                </div>
            </aside>
            <main class="app-main">
                {{ $slot }}
            </main>
        </div>
    @else
        <main class="public-main">
            {{ $slot }}
        </main>
    @endauth
</body>
</html>
