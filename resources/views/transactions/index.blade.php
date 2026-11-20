<x-layout title="Transaksi | KelolaIn">
    <div class="dashboard-page transaction-page">
        <div class="dashboard-topbar">
            <div><p class="eyebrow">Catatan transaksi</p><h1>Semua transaksi.</h1><p class="page-lead">Tambahkan setiap uang yang masuk dan keluar supaya ringkasanmu tetap jujur.</p></div>
            <a class="secondary-action" href="{{ route('dashboard') }}">Kembali ke ringkasan</a>
        </div>

        @if (session('status'))
            <div class="status-box" role="status">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="error-box" role="alert"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <section class="transaction-form-panel panel">
            <div class="panel-heading"><div><span class="panel-label">Catatan baru</span><h2>Tambah transaksi</h2></div><span class="panel-period">Data tersimpan di akunmu</span></div>
            <form class="transaction-form" method="post" action="{{ route('transactions.store') }}">
                @csrf
                <label><span>Jenis dan kategori</span><select name="kategori_id" required><option value="">Pilih kategori</option>@foreach ($categories as $category)<option value="{{ $category->id_kategori }}" @selected(old('kategori_id') == $category->id_kategori)>{{ ucfirst($category->jenis) }} · {{ $category->nama_kategori }}</option>@endforeach</select></label>
                <label><span>Jumlah</span><input type="number" name="jumlah" min="1" step="0.01" value="{{ old('jumlah') }}" placeholder="Contoh: 50000" required></label>
                <label><span>Tanggal</span><input type="date" name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required></label>
                <label class="wide-field"><span>Keterangan <small>(opsional)</small></span><input type="text" name="keterangan" value="{{ old('keterangan') }}" maxlength="255" placeholder="Contoh: Makan siang bersama teman"></label>
                <button class="primary-action" type="submit">Simpan transaksi</button>
            </form>
        </section>

        <section class="panel transaction-table-panel">
            <div class="panel-heading"><div><span class="panel-label">Riwayat</span><h2>Transaksi {{ now()->create($year, $month, 1)->translatedFormat('F Y') }}</h2></div><form class="period-filter" method="get" action="{{ route('transactions.index') }}"><label><span class="sr-only">Bulan</span><select name="month"><option value="1" @selected($month === 1)>Januari</option><option value="2" @selected($month === 2)>Februari</option><option value="3" @selected($month === 3)>Maret</option><option value="4" @selected($month === 4)>April</option><option value="5" @selected($month === 5)>Mei</option><option value="6" @selected($month === 6)>Juni</option><option value="7" @selected($month === 7)>Juli</option><option value="8" @selected($month === 8)>Agustus</option><option value="9" @selected($month === 9)>September</option><option value="10" @selected($month === 10)>Oktober</option><option value="11" @selected($month === 11)>November</option><option value="12" @selected($month === 12)>Desember</option></select></label><label><span class="sr-only">Tahun</span><select name="year"><option>{{ now()->year }}</option><option>{{ now()->year - 1 }}</option></select></label><button class="secondary-action" type="submit">Terapkan</button></form></div>
            @if ($transactions->isEmpty())
                <div class="empty-panel transaction-empty"><div class="empty-icon" aria-hidden="true">＋</div><div><strong>Belum ada transaksi di periode ini.</strong><p>Tambahkan catatan pertama menggunakan formulir di atas.</p></div></div>
            @else
                <div class="transaction-table-wrap"><table class="transaction-table"><thead><tr><th>Tanggal</th><th>Keterangan</th><th>Kategori</th><th>Jenis</th><th class="amount-cell">Jumlah</th><th><span class="sr-only">Aksi</span></th></tr></thead><tbody>@foreach ($transactions as $transaction)<tr><td>{{ $transaction->tanggal->format('d M Y') }}</td><td><strong>{{ $transaction->keterangan ?: 'Tanpa keterangan' }}</strong></td><td>{{ $transaction->category->nama_kategori }}</td><td><span class="type-label type-{{ $transaction->category->jenis }}">{{ ucfirst($transaction->category->jenis) }}</span></td><td class="amount-cell type-{{ $transaction->category->jenis }}">{{ $transaction->category->jenis === 'pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->jumlah, 0, ',', '.') }}</td><td class="action-cell"><form method="post" action="{{ route('transactions.destroy', $transaction) }}">@csrf @method('DELETE')<button class="delete-action" type="submit">Hapus</button></form></td></tr>@endforeach</tbody></table></div><div class="pagination-wrap">{{ $transactions->links() }}</div>
            @endif
        </section>
    </div>
</x-layout>
