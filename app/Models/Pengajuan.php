<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengajuan',
        'pengaju_id',
        'penyetuju_id',
        'barang_id',
        'keperluan',
        'tgl_pengajuan',
        'tgl_batas',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
