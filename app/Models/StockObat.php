<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockObat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'stock_lama'
    ];

    public static function join()
    {
        $data = DB::table('stock_obats')
        ->join('obats', 'obats.id', 'stock_obats.obat_id')
        ->join('users', 'users.id', 'stock_obats.admin')
        ->select('stock_obats.*', 'obats.nama as namaObat','users.name as admins',)
        ->orderBy('stock_obats.updated_at', 'DESC')
        ->get();
        return $data;
    }
}
