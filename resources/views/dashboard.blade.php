<x-layout title="Ringkasan | KelolaIn">
    <div class="dashboard-page">
        <div class="dashboard-topbar">
            <div>
                <p class="eyebrow">Ringkasan keuangan</p>
                <h1>Halo, {{ auth()->user()->nama }}.</h1>
                <p class="page-lead">Satu pandangan untuk memahami ke mana uangmu bergerak.</p>
            </div>
            <div class="topbar-actions">
                <form class="period-filter dashboard-period-filter" method="get" action="{{ route('dashboard') }}"><label><span class="sr-only">Bulan</span><select name="month"><option value="1" @selected($month === 1)>Januari</option><option value="2" @selected($month === 2)>Februari</option><option value="3" @selected($month === 3)>Maret</option><option value="4" @selected($month === 4)>April</option><option value="5" @selected($month === 5)>Mei</option><option value="6" @selected($month === 6)>Juni</option><option value="7" @selected($month === 7)>Juli</option><option value="8" @selected($month === 8)>Agustus</option><option value="9" @selected($month === 9)>September</option><option value="10" @selected($month === 10)>Oktober</option><option value="11" @selected($month === 11)>November</option><option value="12" @selected($month === 12)>Desember</option></select></label><label><span class="sr-only">Tahun</span><select name="year"><option>{{ now()->year }}</option><option>{{ now()->year - 1 }}</option></select></label><button class="secondary-action" type="submit">Terapkan</button></form>
                <a class="primary-action" href="{{ route('transactions.index') }}">+ Tambah transaksi</a>
            </div>
        </div>

        <section class="balance-hero" aria-label="Saldo utama">
            <div>
                <span class="balance-kicker">Saldo tersedia</span>
                <strong class="balance-value">Rp {{ number_format($allIncome - $allExpense, 0, ',', '.') }}</strong>
                <span class="balance-note"><span class="trend-up">{{ $allIncome > 0 ? number_format(($income / $allIncome) * 100, 1, ',', '.') : '0' }}%</span> pemasukan tercatat bulan ini</span>
            </div>
            <div class="balance-orbit" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="balance-meta"><span>Periode aktif</span><strong>November 2026</strong><a href="#analitik">Lihat analitik <span aria-hidden="true">↗</span></a></div>
        </section>

        <section class="metric-grid" aria-label="Metrik bulan ini">
            <article class="metric-card"><div class="metric-icon income-icon" aria-hidden="true">↙</div><div><span>Total pemasukan</span><strong>Rp {{ number_format($income, 0, ',', '.') }}</strong><small><b>{{ $monthly->sum('income') > 0 ? 'Aktif' : 'Belum ada' }}</b> bulan ini</small></div></article>
            <article class="metric-card"><div class="metric-icon expense-icon" aria-hidden="true">↗</div><div><span>Total pengeluaran</span><strong>Rp {{ number_format($expense, 0, ',', '.') }}</strong><small><b>{{ $expense > 0 ? 'Terpantau' : 'Belum ada' }}</b> bulan ini</small></div></article>
            <article class="metric-card"><div class="metric-icon saving-icon" aria-hidden="true">◎</div><div><span>Rasio menabung</span><strong>{{ $income > 0 ? number_format((($income - $expense) / $income) * 100, 1, ',', '.') : '0' }}%</strong><small><b>{{ $income > 0 && $expense <= $income ? 'Sehat' : 'Perlu dicek' }}</b> dari pemasukan</small></div></article>
        </section>

        <div class="dashboard-grid" id="analitik">
            <section class="panel monthly-panel">
                <div class="panel-heading"><div><span class="panel-label">Arus kas</span><h2>Pemasukan & pengeluaran</h2></div><label class="select-wrap"><span class="sr-only">Pilih periode grafik</span><select><option>2026</option><option>2025</option></select></label></div>
                <div class="chart-legend"><span><i class="legend-dot income-dot"></i>Pemasukan</span><span><i class="legend-dot expense-dot"></i>Pengeluaran</span></div>
                <div class="bar-chart" role="img" aria-label="Grafik pemasukan dan pengeluaran per bulan {{ $year }}"><div class="bar-chart-grid"><span>Rp {{ number_format(max(1, $monthly->max(fn ($item) => max($item['income'], $item['expense']))) / 1000000, 1, ',', '.') }} jt</span><span>Rp 0</span></div><div class="bar-chart-columns">@foreach ($monthly as $item)<div class="month-column"><div class="month-bars"><span class="monthly-income" style="height: {{ $monthly->max(fn ($entry) => max($entry['income'], $entry['expense'])) > 0 ? max(4, ($item['income'] / $monthly->max(fn ($entry) => max($entry['income'], $entry['expense']))) * 100) : 4 }}%" title="Pemasukan {{ number_format($item['income'], 0, ',', '.') }}"></span><span class="monthly-expense" style="height: {{ $monthly->max(fn ($entry) => max($entry['income'], $entry['expense'])) > 0 ? max(4, ($item['expense'] / $monthly->max(fn ($entry) => max($entry['income'], $entry['expense']))) * 100) : 4 }}%" title="Pengeluaran {{ number_format($item['expense'], 0, ',', '.') }}"></span></div><small>{{ $item['label'] }}</small></div>@endforeach</div></div>
            </section>

            <section class="panel category-panel" id="kategori">
                <div class="panel-heading"><div><span class="panel-label">Komposisi</span><h2>Pengeluaran per kategori</h2></div><a class="text-action" href="{{ route('transactions.index') }}">Selengkapnya</a></div>
                <div class="donut-wrap"><div class="donut-chart" role="img" aria-label="Grafik pengeluaran per kategori"><span>Rp {{ number_format($expense, 0, ',', '.') }}<small>Total</small></span></div><div class="category-legend">@forelse ($expenseByCategory->take(4) as $index => $category)<div><i class="category-dot category-color-{{ $index }}"></i><span>{{ $category['name'] }}</span><strong>{{ $expense > 0 ? number_format(($category['total'] / $expense) * 100, 0) : 0 }}%</strong></div>@empty<div class="empty-chart-note">Belum ada pengeluaran pada periode ini.</div>@endforelse</div></div>
            </section>
        </div>

        <div class="dashboard-grid lower-grid">
            <section class="panel category-bars-panel">
                <div class="panel-heading"><div><span class="panel-label">Perbandingan</span><h2>Pemasukan per kategori</h2></div><span class="panel-period">November 2026</span></div>
                <div class="category-bars">@forelse ($incomeByCategory->take(4) as $category)<div class="bar-row"><div><span>{{ $category['name'] }}</span><strong>Rp {{ number_format($category['total'], 0, ',', '.') }}</strong></div><div class="bar-track"><span style="width: {{ $income > 0 ? max(4, ($category['total'] / $income) * 100) : 4 }}%"></span></div></div>@empty<div class="empty-chart-note">Belum ada pemasukan pada periode ini.</div>@endforelse</div>
            </section>
            <section class="panel recent-panel" id="transaksi">
                <div class="panel-heading"><div><span class="panel-label">Aktivitas</span><h2>Transaksi terbaru</h2></div><a class="text-action" href="{{ route('transactions.index') }}">Lihat semua</a></div>
                <div class="transaction-list">@forelse ($recent as $transaction)<div class="transaction-row"><span class="transaction-symbol {{ $transaction->category->jenis === 'pemasukan' ? 'income' : 'food' }}">{{ strtoupper(substr($transaction->category->nama_kategori, 0, 1)) }}</span><div><strong>{{ $transaction->keterangan ?: 'Tanpa keterangan' }}</strong><small>{{ $transaction->tanggal->translatedFormat('d M') }} · {{ $transaction->category->nama_kategori }}</small></div><b class="{{ $transaction->category->jenis === 'pemasukan' ? 'amount-in' : 'amount-out' }}">{{ $transaction->category->jenis === 'pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->jumlah, 0, ',', '.') }}</b></div>@empty<div class="empty-chart-note">Belum ada transaksi. Tambahkan catatan pertamamu.</div>@endforelse</div>
            </section>
        </div>

        <section class="empty-panel prototype-note" id="bantuan"><div class="empty-icon" aria-hidden="true">✦</div><div><strong>Ini adalah preview UI KelolaIn.</strong><p>Angka dan grafik di atas adalah data contoh untuk memvalidasi tampilan. Setelah desain disetujui, semuanya akan terhubung ke transaksi asli.</p></div><a href="{{ route('transactions.index') }}" class="secondary-action">Mulai dari transaksi</a></section>
    </div>
</x-layout>
