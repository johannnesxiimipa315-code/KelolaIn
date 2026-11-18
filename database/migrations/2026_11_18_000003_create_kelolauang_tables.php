<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'nama');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 50);
            $table->enum('jenis', ['pemasukan', 'pengeluaran']);
            $table->unique(['nama_kategori', 'jenis'], 'uq_kategori');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('kategori_id');
            $table->decimal('jumlah', 12, 2);
            $table->string('keterangan', 255)->nullable();
            $table->date('tanggal');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('kategori_id')->references('id_kategori')->on('categories')->restrictOnDelete();
            $table->index(['user_id', 'tanggal'], 'idx_user_tanggal');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('categories');
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
        });
    }
};
