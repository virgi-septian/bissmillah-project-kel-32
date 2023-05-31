<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function join()
    {
        $data = DB::table('obats')
        ->join('kategoris', 'obats.kategori_id', 'kategoris.id')
        ->join('satuans', 'obats.satuan_id', 'satuans.id')
        ->select('obats.*', 'kategoris.kategori as kategoris','satuans.satuan as satuans')
        ->orderBy('obats.updated_at', 'DESC')
        ->get();
        return $data;
    }
    public static function joinStock()
    {
        $data = DB::table('obats')
        ->join('kategoris', 'obats.kategori_id', 'kategoris.id')
        ->join('satuans', 'obats.satuan_id', 'satuans.id')
        ->select('obats.*', 'kategoris.kategori as kategoris','satuans.satuan as satuans',)
        ->orderBy('obats.updated_at', 'DESC')
        ->get();
        return $data;
    }
}
