<?php

// app/Models/Peminjaman.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; 

   protected $fillable = [
    'user_id',
    'inventaris_id',
    'jumlah_pinjam',
    'tanggal_pinjam',
    'tanggal_kembali',
    'status',
    'disetujui_oleh',
    'kondisi_kembali', // ← pastikan ini ada!
];




    public function barang()
    {
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function approver() {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}
