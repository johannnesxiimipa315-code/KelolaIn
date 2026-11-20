<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $month = max(1, min(12, $request->integer('month', now()->month)));
        $year = $request->integer('year', now()->year);
        $user = $request->user();
        $periodTransactions = $user->transactions()
            ->with('category')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month);

        $income = (clone $periodTransactions)->whereHas('category', fn ($query) => $query->where('jenis', 'pemasukan'))->sum('jumlah');
        $expense = (clone $periodTransactions)->whereHas('category', fn ($query) => $query->where('jenis', 'pengeluaran'))->sum('jumlah');
        $allIncome = $user->transactions()->whereHas('category', fn ($query) => $query->where('jenis', 'pemasukan'))->sum('jumlah');
        $allExpense = $user->transactions()->whereHas('category', fn ($query) => $query->where('jenis', 'pengeluaran'))->sum('jumlah');

        $monthly = collect(range(1, 12))->map(function (int $monthNumber) use ($user, $year) {
            $query = $user->transactions()->whereYear('tanggal', $year)->whereMonth('tanggal', $monthNumber);
            return [
                'label' => now()->create($year, $monthNumber, 1)->translatedFormat('M'),
                'income' => (clone $query)->whereHas('category', fn ($category) => $category->where('jenis', 'pemasukan'))->sum('jumlah'),
                'expense' => (clone $query)->whereHas('category', fn ($category) => $category->where('jenis', 'pengeluaran'))->sum('jumlah'),
            ];
        });

        $expenseByCategory = (clone $periodTransactions)
            ->whereHas('category', fn ($query) => $query->where('jenis', 'pengeluaran'))
            ->get()
            ->groupBy('kategori_id')
            ->map(fn ($items) => ['name' => $items->first()->category->nama_kategori, 'total' => $items->sum('jumlah')])
            ->sortByDesc('total')
            ->values();
        $incomeByCategory = (clone $periodTransactions)
            ->whereHas('category', fn ($query) => $query->where('jenis', 'pemasukan'))
            ->get()
            ->groupBy('kategori_id')
            ->map(fn ($items) => ['name' => $items->first()->category->nama_kategori, 'total' => $items->sum('jumlah')])
            ->sortByDesc('total')
            ->values();
        $recent = $user->transactions()->with('category')->latest('tanggal')->latest('id_transaksi')->limit(5)->get();

        return view('dashboard', compact(
            'month', 'year', 'income', 'expense', 'allIncome', 'allExpense',
            'monthly', 'expenseByCategory', 'incomeByCategory', 'recent'
        ));
    }
}
