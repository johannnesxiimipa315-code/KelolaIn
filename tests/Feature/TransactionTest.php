<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_and_view_a_transaction(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'nama_kategori' => 'Makan',
            'jenis' => 'pengeluaran',
        ]);

        $response = $this->actingAs($user)->post(route('transactions.store'), [
            'kategori_id' => $category->id_kategori,
            'jumlah' => 45000,
            'tanggal' => '2026-11-20',
            'keterangan' => 'Makan siang',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'kategori_id' => $category->id_kategori,
            'keterangan' => 'Makan siang',
        ]);

        $this->actingAs($user)
            ->get(route('transactions.index', ['month' => 11, 'year' => 2026]))
            ->assertOk()
            ->assertSee('Makan siang');
    }

    public function test_user_cannot_delete_another_users_transaction(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $category = Category::create([
            'nama_kategori' => 'Transportasi',
            'jenis' => 'pengeluaran',
        ]);
        $transaction = $owner->transactions()->create([
            'kategori_id' => $category->id_kategori,
            'jumlah' => 20000,
            'tanggal' => '2026-11-20',
            'keterangan' => 'Bus',
        ]);

        $this->actingAs($otherUser)
            ->delete(route('transactions.destroy', $transaction))
            ->assertForbidden();

        $this->assertDatabaseHas('transactions', ['id_transaksi' => $transaction->id_transaksi]);
    }
}
