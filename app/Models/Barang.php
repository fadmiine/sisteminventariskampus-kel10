<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kategori', 'harga', 'status', 'stok', 'foto'];

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }
}
