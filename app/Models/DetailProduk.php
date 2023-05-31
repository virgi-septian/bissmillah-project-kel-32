<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    use HasFactory;
    public $filable = ['jumlah_pembelian', 'detail', 'spesifikasi', 'id_produks'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produks');
    }
}
