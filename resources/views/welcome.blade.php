<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KelolaIn membantu mencatat dan memahami keuangan pribadi.">
    <title>KelolaIn | Catatan keuangan pribadi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    <header class="app-header">
        <div class="app-header-inner">
            <a class="brand" href="{{ url('/') }}" aria-label="KelolaIn, beranda"><img class="brand-mark" src="{{ asset('logo_kelolain.png') }}" alt="Logo KelolaIn"><span class="brand-copy"><strong>KelolaIn</strong><small>Catat. Pahami. Kendalikan.</small></span></a>
            <nav class="public-nav" aria-label="Navigasi halaman"><a href="#fitur">Fitur</a><a href="#alur">Cara kerja</a><a class="header-action" href="{{ route('register') }}">Buat akun</a></nav>
        </div>
    </header>
    <main class="landing-main">
        <section class="landing-hero" id="mulai">
            <div class="landing-copy">
                <p class="eyebrow">Keuangan pribadi, lebih terarah</p>
                <h1>Uangmu lebih mudah dipahami saat semuanya tercatat.</h1>
                <p class="landing-lead">Kelola pemasukan, pengeluaran, dan saldo pribadi dalam satu ruang yang tenang dan mudah digunakan.</p>
                <div class="landing-actions"><a class="primary-action" href="{{ route('register') }}">Mulai mencatat</a><a class="secondary-action" href="#fitur">Lihat fitur</a></div>
            </div>
            <div class="landing-illustration" role="img" aria-label="Ilustrasi seseorang sedang memeriksa ringkasan keuangan pribadi">
                <div class="illustration-orbit illustration-orbit-one"></div><div class="illustration-orbit illustration-orbit-two"></div>
                <div class="illustration-card illustration-card-top"><span class="card-pulse" aria-hidden="true"></span><span>Keuangan lebih jelas</span><strong>+ 24,8%</strong></div>
                <svg class="person-illustration" viewBox="0 0 460 420" aria-hidden="true" focusable="false">
                    <path class="illustration-shadow" d="M76 382c44-30 91-42 154-42 74 0 122 15 166 42"/>
                    <path class="illustration-back-hair" d="M220 84c-24 10-40 35-38 72l12 52 64-20 1-85c-8-18-21-25-39-19Z"/>
                    <path class="illustration-shirt" d="M148 356c8-63 11-123 45-157l39-17 52 18c35 29 43 91 48 156H148Z"/>
                    <path class="illustration-shirt-detail" d="m231 184 14 55 24-54"/>
                    <path class="illustration-neck" d="m216 142 1 39c9 12 24 18 39 4l-1-43"/>
                    <path class="illustration-face" d="M198 83c-3 38 2 70 29 82 25 13 49-4 56-31l3-54-38-20-40 13-10 10Z"/>
                    <path class="illustration-hair" d="M196 93c-8-27 8-63 44-65 31-2 55 18 52 53l-15 10-8-31c-13 17-39 26-63 20l-4 29-6-16Z"/>
                    <path class="illustration-ear" d="M282 107c10-7 14 4 7 15l-8 6"/>
                    <path class="illustration-eye" d="m232 112 7-1m19-1 7-1"/>
                    <path class="illustration-smile" d="M247 137c7 5 13 5 19-1"/>
                    <path class="illustration-arm" d="M294 218c29 14 52 33 67 57l-34 31-54-45"/>
                    <path class="illustration-hand" d="m327 298 31-27 19 13-14 37-25 10Z"/>
                    <path class="illustration-phone" d="m329 260 45-13 19 67-45 13Z"/>
                    <path class="illustration-phone-screen" d="m337 266 31-9 12 46-30 9Z"/>
                    <path class="illustration-chart" d="m344 294 9-9 8 3 8-15"/>
                    <circle class="illustration-chart-dot" cx="369" cy="273" r="3"/>
                    <path class="illustration-leg" d="m204 354-13 48h-40l25-48m80 0 21 48h40l-27-48"/>
                </svg>
                <div class="illustration-card illustration-card-bottom"><span class="mini-ring" aria-hidden="true"></span><span><small>Rasio menabung</small><strong>61,2%</strong></span></div>
            </div>
        </section>
        <section class="landing-section" id="fitur"><div class="landing-section-heading"><p class="eyebrow">Yang kamu butuhkan</p><h2>Satu kebiasaan kecil untuk keputusan yang lebih jelas.</h2></div><div class="landing-feature-grid"><article><span class="feature-index">01</span><h3>Catat transaksi</h3><p>Tambahkan pemasukan dan pengeluaran dengan kategori, jumlah, tanggal, dan keterangan yang jelas.</p></article><article class="featured-feature"><span class="feature-index">02</span><h3>Pahami pola</h3><p>Lihat ringkasan kategori serta grafik bulanan agar kebiasaan keuangan lebih mudah dibaca.</p></article><article><span class="feature-index">03</span><h3>Jaga kendali</h3><p>Gunakan dashboard untuk mengecek kondisi keuangan tanpa menebak-nebak.</p></article></div></section>
        <section class="landing-flow" id="alur"><div><p class="eyebrow">Cara kerja</p><h2>Dari catatan harian menjadi gambaran yang utuh.</h2><p class="landing-lead">Mulai dengan data sederhana. KelolaIn membantu mengubahnya menjadi ringkasan yang bisa kamu gunakan.</p></div><ol><li><span>1</span><div><strong>Masukkan transaksi</strong><p>Catat saat uang masuk atau keluar.</p></div></li><li><span>2</span><div><strong>Pilih kategori</strong><p>Kelompokkan supaya setiap angka punya konteks.</p></div></li><li><span>3</span><div><strong>Cek ringkasan</strong><p>Gunakan grafik dan analitik untuk melihat posisi keuangan.</p></div></li></ol></section>
    </main>
    <footer class="landing-footer"><span>KelolaIn</span><span>Catat dengan sadar, kelola dengan tenang.</span></footer>
</body>
</html>
