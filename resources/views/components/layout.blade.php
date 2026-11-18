<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'KelolaUang' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-950 antialiased">
    <header class="site-header">
        <div class="site-container header-inner">
            <a class="brand" href="{{ route('dashboard') }}">
                <span class="brand-mark" aria-hidden="true">K</span>
                <span><strong>KelolaUang</strong><small>Catatan keuangan pribadi</small></span>
            </a>
            @auth
                <nav class="site-nav" aria-label="Navigasi utama">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                </nav>
            @endauth
        </div>
    </header>
    <main class="site-main">
        {{ $slot }}
    </main>
</body>
</html>
