<x-layout title="Dashboard | KelolaIn">
    <div class="site-container dashboard-shell">
        <div class="dashboard-heading">
            <div><p class="eyebrow">Ringkasan pribadi</p><h1>Halo, {{ auth()->user()->nama }}.</h1><p class="muted">Mulai dari satu catatan kecil hari ini.</p></div>
            <a class="primary-action" href="#">Tambah transaksi</a>
        </div>
        <div class="dashboard-cards">
            <article><span>Total saldo</span><strong>Rp 0</strong><small>Belum ada transaksi</small></article>
            <article><span>Pemasukan bulan ini</span><strong>Rp 0</strong><small>Belum ada transaksi</small></article>
            <article><span>Pengeluaran bulan ini</span><strong>Rp 0</strong><small>Belum ada transaksi</small></article>
        </div>
        <section class="empty-panel"><h2>Belum ada transaksi.</h2><p>Tambahkan transaksi pertama untuk mulai melihat ringkasan keuanganmu.</p></section>
    </div>
</x-layout>
