<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'user_id',
        'nama_karyawan',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'tgl_perekrutan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
