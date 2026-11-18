<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Uang Saku', 'jenis' => 'pemasukan'],
            ['nama_kategori' => 'Beasiswa', 'jenis' => 'pemasukan'],
            ['nama_kategori' => 'Gaji Part-time', 'jenis' => 'pemasukan'],
            ['nama_kategori' => 'Lainnya', 'jenis' => 'pemasukan'],
            ['nama_kategori' => 'Makan', 'jenis' => 'pengeluaran'],
            ['nama_kategori' => 'Transportasi', 'jenis' => 'pengeluaran'],
            ['nama_kategori' => 'Kos dan Tagihan', 'jenis' => 'pengeluaran'],
            ['nama_kategori' => 'Pendidikan', 'jenis' => 'pengeluaran'],
            ['nama_kategori' => 'Hiburan', 'jenis' => 'pengeluaran'],
            ['nama_kategori' => 'Lainnya', 'jenis' => 'pengeluaran'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert($category, $category);
        }
    }
}
