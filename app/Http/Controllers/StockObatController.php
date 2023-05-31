<?php

namespace App\Http\Controllers;

use App\Models\StockObat;
use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StockObatController extends Controller
{
    public function index(Request $request){
        $obat = Obat::where('ready', 'N')->get();
        $data = StockObat::join();
        if($request->ajax())
        {
            return DataTables::of($data)
            ->addColumn('aksi', function($data)
            {
                $button = ' <div class="d-flex"> ';

                $button .= ' <button id="'.$data->id.'" name="edit" class="edit btn btn-outline-success btn-sm me-1"><i class="bi bi-pencil-fill"></i></button> ';
                $button .= ' <button id="'.$data->id.'" name="hapus" class="hapus btn btn-outline-danger btn-sm me-1"><i class="bi bi-trash-fill"></i></button> ';
                $button .= ' </div> ';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
        }   

        return view('layouts.dashboards.owner.stockObat', compact('obat'));
    }

    public function getObat(Request $request)
    {
        $data = StockObat::where('obat_id', $request->id)->first();
        $null = [
            'stock' => 0,
        ];
        if($data != NULL){
            return response()->json(['data' => $data]);
        }
        else {
            return response()->json(['data' => $null]);
        }

    }

    public function store(Request $request)
    {
        $data = new StockObat();
        $data->obat_id = $request->obat;
        $data->masuk = $request->masuk;
        $data->keluar = $request->keluar;
        $data->stock = $request->stock;
        $data->beli = $request->beli;
        $data->jual = $request->jual;
        $data->expired = $request->expired;
        $data->keterangan = $request->keterangan;
        $data->admin = Auth::user()->id;
        $simpan = $data->save();
        if ($simpan) {
            DB::table('obats')->where('id', $request->obat)->update(['ready' => 'Y']);
            return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Disimpan'], 422);    
        }        
    }

    public function edits(Request $request)
    {
        // dd($request->all());
        $data = StockObat::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = StockObat::find($request->id);
        $simpan = $data->update($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Disimpan'], 400);    
        }
    }

    public function destroy(Request $request)
    {
        $data = StockObat::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            DB::table('obats')->where('id', $request->obat)->update(['ready' => 'N']);
            return response()->json(['text' => 'Data Berhasil Dihapus'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Dihapus'], 400);    
        }
    }
}
