<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'ukuran',
        'warna',
        'merek',
        'jenis_barang',
        'stok',
        'harga_beli',
        'harga_jual',
    ];
}
