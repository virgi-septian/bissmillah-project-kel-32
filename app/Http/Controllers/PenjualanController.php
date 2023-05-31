<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index(Request $request){
        $obat = Obat::joinStock();
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Penjualan::count();
        if ($cek == 0){
            $urut = 1001;
            $nomer = 'NT' . $thnBulan . $urut;
            // dd($nomer);
        }else {
            // echo('ssdf');
            $ambil = Penjualan::all()->last();
            $urut = (int)substr($ambil->nota, -4) + 1;
            $nomer = 'NT' . $thnBulan . $urut;
        }


        return view('layouts.dashboards.owner.penjualanBarang', compact('obat','tanggals', 'nomer'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'telp' => 'required|min:12|unique:suppliers',
            'email' => 'required|unique:suppliers',
            'rekening' => 'required|unique:suppliers',
            'alamat' => 'required',
        ];

        $text = [
            'nama.required' => 'Kolom nama tidak boleh kosong',
            'telp.required' => 'Kolom telepon tidak boleh kosong',
            'telp.unique' => 'No telepon sudah terdaftar',
            'telp.min' => 'Inputan no. telepon kurang dari 12 digit',
            'email.required' => 'Kolom email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'rekening.required' => 'Kolom rekening tidak boleh kosong',
            'rekening.unique' => 'No rekening sudah terdaftar',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);

        if($validasi->fails()){
            return response()->json(['success' => 0,'text' => $validasi->errors()->first()], 422); 
        }

        $simpan = Penjualan::create($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Disimpan'], 422);    
        }
    }

    public function edits(Request $request)
    {
        // dd($request->all());
        $data = Penjualan::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Penjualan::find($request->id);
        $rules = [
            'nama' => 'required',
            'telp' => 'required|min:12',
            'email' => 'required',
            'rekening' => 'required',
            'alamat' => 'required',
        ];

        if ($data->telp != $request->telp){
            $rules['telp'] = 'unique:suppliers';
        }
        if ($data->telp != $request->telp){
            $rules['email'] = 'unique:suppliers';
        }
        if ($data->telp != $request->telp){
            $rules['rekening'] = 'unique:suppliers';
        }

        $text = [
            'nama.required' => 'Kolom nama tidak boleh kosong',
            'telp.required' => 'Kolom telepon tidak boleh kosong',
            'telp.unique' => 'No telepon sudah terdaftar',
            'telp.min' => 'Inputan no. telepon kurang dari 12 digit',
            'email.required' => 'Kolom email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'rekening.required' => 'Kolom rekening tidak boleh kosong',
            'rekening.unique' => 'No rekening sudah terdaftar',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);

        if($validasi->fails()){
            return response()->json(['success' => 0,'text' => $validasi->errors()->first()], 422); 
        }
        
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
        $data = Penjualan::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Data Berhasil Dihapus'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Dihapus'], 400);    
        }
    }
}
