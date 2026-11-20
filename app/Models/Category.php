<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'jenis',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'kategori_id', 'id_kategori');
    }
}
