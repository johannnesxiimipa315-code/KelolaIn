<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(Request $request): View
    {
        $month = $request->integer('month', now()->month);
        $year = $request->integer('year', now()->year);

        $transactions = $request->user()->transactions()
            ->with('category')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->latest('tanggal')
            ->latest('id_transaksi')
            ->paginate(12)
            ->withQueryString();

        return view('transactions.index', [
            'transactions' => $transactions,
            'categories' => Category::orderBy('jenis')->orderBy('nama_kategori')->get(),
            'month' => $month,
            'year' => $year,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kategori_id' => ['required', 'exists:categories,id_kategori'],
            'jumlah' => ['required', 'numeric', 'min:1', 'max:9999999999.99'],
            'tanggal' => ['required', 'date'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ]);

        $request->user()->transactions()->create($data);

        return back()->with('status', 'Transaksi berhasil ditambahkan.');
    }

    public function destroy(Request $request, Transaction $transaction): RedirectResponse
    {
        abort_unless($transaction->user_id === $request->user()->id, 403);
        $transaction->delete();

        return back()->with('status', 'Transaksi berhasil dihapus.');
    }
}
