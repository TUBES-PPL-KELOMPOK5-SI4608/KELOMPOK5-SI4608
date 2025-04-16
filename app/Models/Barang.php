<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Menambahkan atribut yang boleh diisi melalui mass-assignment
    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok',
        'harga',
    ];
}