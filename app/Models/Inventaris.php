<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
    'nama_barang',
    'kategori',
    'kondisi',
    'status',
    'jumlah',
];
}
