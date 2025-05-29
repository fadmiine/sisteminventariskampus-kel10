<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'nama_pembeli', 'jumlah'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    // Mutator untuk mengubah created_at menjadi 1 minggu yang lalu
    // public function setCreatedAtAttribute($value)
    // {
    //     $this->attributes['created_at'] = Carbon::now()->subYears(9); 
    // }
    
    // Mutator untuk mengubah updated_at menjadi 2 hari yang lalu
    // public function setUpdatedAtAttribute($value)
    // {
    //     $this->attributes['updated_at'] = Carbon::now()->subDays(2); 
    // }
}
