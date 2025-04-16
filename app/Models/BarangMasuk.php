<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'barang_id',
        'jumlah_masuk',
        'tanggal_masuk',
        'nomor_faktur',
        'harga_beli',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
