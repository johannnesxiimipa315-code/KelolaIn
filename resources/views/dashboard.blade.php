<x-layout title="Ringkasan | KelolaIn">
    <div class="dashboard-page">
        <div class="dashboard-topbar">
            <div>
                <p class="eyebrow">Ringkasan keuangan</p>
                <h1>Halo, {{ auth()->user()->nama }}.</h1>
                <p class="page-lead">Satu pandangan untuk memahami ke mana uangmu bergerak.</p>
            </div>
            <div class="topbar-actions">
                <span class="data-status">Data contoh</span>
                <a class="primary-action" href="{{ route('transactions.index') }}">+ Tambah transaksi</a>
            </div>
        </div>

        <section class="balance-hero" aria-label="Saldo utama">
            <div>
                <span class="balance-kicker">Saldo tersedia</span>
                <strong class="balance-value">Rp 2.450.000</strong>
                <span class="balance-note"><span class="trend-up">↗ 8,4%</span> dibanding bulan lalu</span>
            </div>
            <div class="balance-orbit" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="balance-meta"><span>Periode aktif</span><strong>November 2026</strong><a href="#analitik">Lihat analitik <span aria-hidden="true">↗</span></a></div>
        </section>

        <section class="metric-grid" aria-label="Metrik bulan ini">
            <article class="metric-card"><div class="metric-icon income-icon" aria-hidden="true">↙</div><div><span>Total pemasukan</span><strong>Rp 4.000.000</strong><small><b>+12,5%</b> dari bulan lalu</small></div></article>
            <article class="metric-card"><div class="metric-icon expense-icon" aria-hidden="true">↗</div><div><span>Total pengeluaran</span><strong>Rp 1.550.000</strong><small><b>+4,2%</b> dari bulan lalu</small></div></article>
            <article class="metric-card"><div class="metric-icon saving-icon" aria-hidden="true">◎</div><div><span>Rasio menabung</span><strong>61,2%</strong><small><b>Sehat</b> dari pemasukan</small></div></article>
        </section>

        <div class="dashboard-grid" id="analitik">
            <section class="panel monthly-panel">
                <div class="panel-heading"><div><span class="panel-label">Arus kas</span><h2>Pemasukan & pengeluaran</h2></div><label class="select-wrap"><span class="sr-only">Pilih periode grafik</span><select><option>2026</option><option>2025</option></select></label></div>
                <div class="chart-legend"><span><i class="legend-dot income-dot"></i>Pemasukan</span><span><i class="legend-dot expense-dot"></i>Pengeluaran</span></div>
                <div class="line-chart" role="img" aria-label="Grafik contoh pemasukan dan pengeluaran per bulan dari Januari sampai Desember 2026">
                    <div class="chart-y-axis"><span>Rp 5 jt</span><span>Rp 4 jt</span><span>Rp 3 jt</span><span>Rp 2 jt</span><span>Rp 1 jt</span><span>Rp 0</span></div>
                    <svg viewBox="0 0 720 260" preserveAspectRatio="none" aria-hidden="true">
                        <defs><linearGradient id="incomeFill" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="#2764e8" stop-opacity=".22"/><stop offset="1" stop-color="#2764e8" stop-opacity="0"/></linearGradient></defs>
                        <g class="chart-grid-lines"><line x1="0" y1="12" x2="720" y2="12"/><line x1="0" y1="59" x2="720" y2="59"/><line x1="0" y1="106" x2="720" y2="106"/><line x1="0" y1="153" x2="720" y2="153"/><line x1="0" y1="200" x2="720" y2="200"/><line x1="0" y1="247" x2="720" y2="247"/></g>
                        <path class="income-area" d="M0,94 C30,84 36,108 65,83 S105,64 130,78 S165,98 195,58 S235,76 260,59 S300,42 325,67 S365,85 390,54 S425,40 455,58 S490,85 520,46 S560,62 585,35 S625,46 650,28 S695,45 720,20 L720,247 L0,247 Z"/>
                        <path class="income-line" d="M0,94 C30,84 36,108 65,83 S105,64 130,78 S165,98 195,58 S235,76 260,59 S300,42 325,67 S365,85 390,54 S425,40 455,58 S490,85 520,46 S560,62 585,35 S625,46 650,28 S695,45 720,20"/>
                        <path class="expense-line" d="M0,186 C30,178 37,192 65,169 S105,182 130,157 S165,177 195,143 S235,158 260,136 S300,150 325,124 S365,143 390,118 S425,130 455,108 S490,120 520,94 S560,115 585,91 S625,102 650,80 S695,92 720,70"/>
                    </svg>
                    <div class="chart-x-axis"><span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span><span>Jul</span><span>Agu</span><span>Sep</span><span>Okt</span><span>Nov</span><span>Des</span></div>
                </div>
            </section>

            <section class="panel category-panel" id="kategori">
                <div class="panel-heading"><div><span class="panel-label">Komposisi</span><h2>Pengeluaran per kategori</h2></div><a class="text-action" href="{{ route('transactions.index') }}">Selengkapnya</a></div>
                <div class="donut-wrap"><div class="donut-chart" role="img" aria-label="Grafik contoh pengeluaran per kategori"><span>Rp 1,55 jt<small>Total</small></span></div><div class="category-legend"><div><i class="category-dot food"></i><span>Makanan</span><strong>36%</strong></div><div><i class="category-dot transport"></i><span>Transportasi</span><strong>24%</strong></div><div><i class="category-dot bills"></i><span>Tagihan</span><strong>22%</strong></div><div><i class="category-dot other"></i><span>Lainnya</span><strong>18%</strong></div></div></div>
            </section>
        </div>

        <div class="dashboard-grid lower-grid">
            <section class="panel category-bars-panel">
                <div class="panel-heading"><div><span class="panel-label">Perbandingan</span><h2>Pemasukan per kategori</h2></div><span class="panel-period">November 2026</span></div>
                <div class="category-bars"><div class="bar-row"><div><span>Gaji</span><strong>Rp 3.200.000</strong></div><div class="bar-track"><span style="width: 82%"></span></div></div><div class="bar-row"><div><span>Freelance</span><strong>Rp 600.000</strong></div><div class="bar-track"><span style="width: 42%"></span></div></div><div class="bar-row"><div><span>Bonus</span><strong>Rp 200.000</strong></div><div class="bar-track"><span style="width: 20%"></span></div></div></div>
            </section>
            <section class="panel recent-panel" id="transaksi">
                <div class="panel-heading"><div><span class="panel-label">Aktivitas</span><h2>Transaksi terbaru</h2></div><a class="text-action" href="{{ route('transactions.index') }}">Lihat semua</a></div>
                <div class="transaction-list"><div class="transaction-row"><span class="transaction-symbol food">M</span><div><strong>Makan siang</strong><small>Hari ini · Makanan</small></div><b class="amount-out">- Rp 45.000</b></div><div class="transaction-row"><span class="transaction-symbol income">G</span><div><strong>Gaji bulanan</strong><small>01 Nov · Gaji</small></div><b class="amount-in">+ Rp 3.200.000</b></div><div class="transaction-row"><span class="transaction-symbol bills">T</span><div><strong>Tagihan internet</strong><small>03 Nov · Tagihan</small></div><b class="amount-out">- Rp 350.000</b></div></div>
            </section>
        </div>

        <section class="empty-panel prototype-note" id="bantuan"><div class="empty-icon" aria-hidden="true">✦</div><div><strong>Ini adalah preview UI KelolaIn.</strong><p>Angka dan grafik di atas adalah data contoh untuk memvalidasi tampilan. Setelah desain disetujui, semuanya akan terhubung ke transaksi asli.</p></div><a href="{{ route('transactions.index') }}" class="secondary-action">Mulai dari transaksi</a></section>
    </div>
</x-layout>
