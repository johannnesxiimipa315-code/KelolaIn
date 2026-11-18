<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="KelolaUang membantu mahasiswa mencatat dan memahami keuangan pribadi.">
        <title>KelolaUang | Catatan keuangan pribadi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-950 antialiased">
        <header class="site-header">
            <div class="site-container header-inner">
                <a class="brand" href="{{ url('/') }}" aria-label="KelolaUang, beranda">
                    <span class="brand-mark" aria-hidden="true">K</span>
                    <span>
                        <strong>KelolaUang</strong>
                        <small>Catatan keuangan pribadi</small>
                    </span>
                </a>
                <nav class="site-nav" aria-label="Navigasi utama">
                    <a href="#fitur">Fitur</a>
                    <a href="#alur">Cara kerja</a>
                    <a class="nav-action" href="#mulai">Mulai mencatat</a>
                </nav>
            </div>
        </header>

        <main>
            <section class="hero" id="mulai">
                <div class="site-container hero-grid">
                    <div class="hero-copy">
                        <p class="eyebrow">Keuangan pribadi, lebih terarah</p>
                        <h1>Uangmu lebih mudah dipahami saat semuanya tercatat.</h1>
                        <p class="hero-lead">Kelola pemasukan, pengeluaran, dan saldo pribadi dalam satu ruang yang tenang dan mudah digunakan.</p>
                        <div class="hero-actions">
                            <a class="primary-action" href="#fitur">Lihat fitur</a>
                            <a class="secondary-action" href="#alur">Pelajari alurnya</a>
                        </div>
                    </div>
                    <div class="hero-preview" aria-label="Contoh ringkasan keuangan">
                        <div class="preview-topline">
                            <span>Ringkasan bulan ini</span>
                            <span class="preview-dot" aria-hidden="true"></span>
                        </div>
                        <p class="preview-label">Saldo tersedia</p>
                        <p class="preview-balance">Rp 2.450.000</p>
                        <div class="preview-divider"></div>
                        <div class="preview-row">
                            <span><i class="income-mark" aria-hidden="true"></i>Pemasukan</span>
                            <strong>Rp 4.000.000</strong>
                        </div>
                        <div class="preview-row">
                            <span><i class="expense-mark" aria-hidden="true"></i>Pengeluaran</span>
                            <strong>Rp 1.550.000</strong>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-section" id="fitur">
                <div class="site-container">
                    <div class="section-intro">
                        <p class="eyebrow">Yang kamu butuhkan</p>
                        <h2>Satu kebiasaan kecil untuk keputusan yang lebih jelas.</h2>
                    </div>
                    <div class="feature-grid">
                        <article class="feature-card feature-card-featured">
                            <span class="feature-number">01</span>
                            <h3>Catat transaksi</h3>
                            <p>Tambahkan pemasukan dan pengeluaran dengan kategori, jumlah, tanggal, dan keterangan yang jelas.</p>
                        </article>
                        <article class="feature-card">
                            <span class="feature-number">02</span>
                            <h3>Pahami pola</h3>
                            <p>Lihat ringkasan kategori dan transaksi terbaru agar kebiasaan belanjamu lebih mudah dibaca.</p>
                        </article>
                        <article class="feature-card">
                            <span class="feature-number">03</span>
                            <h3>Jaga kendali</h3>
                            <p>Gunakan saldo dan filter bulanan untuk mengecek kondisi keuangan tanpa menebak-nebak.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="flow-section" id="alur">
                <div class="site-container flow-grid">
                    <div>
                        <p class="eyebrow">Cara kerja</p>
                        <h2>Dari catatan harian menjadi gambaran yang utuh.</h2>
                    </div>
                    <ol class="flow-list">
                        <li><span>1</span><div><strong>Masukkan transaksi</strong><p>Catat saat uang masuk atau keluar.</p></div></li>
                        <li><span>2</span><div><strong>Pilih kategori</strong><p>Kelompokkan supaya setiap angka punya konteks.</p></div></li>
                        <li><span>3</span><div><strong>Cek ringkasan</strong><p>Gunakan dashboard untuk melihat posisi keuanganmu.</p></div></li>
                    </ol>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="site-container footer-inner">
                <span>KelolaUang</span>
                <span>Catat dengan sadar, kelola dengan tenang.</span>
            </div>
        </footer>
    </body>
</html>
