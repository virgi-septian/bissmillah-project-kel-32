<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Satuan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    public function index(Request $request){
        $satuan = Satuan::select('id', 'satuan')->get();
        $kategori = Kategori::select('id', 'kategori')->get();
        $data = Obat::join();
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

        return view('layouts.dashboards.owner.obatHome', compact('satuan', 'kategori'));
    }

    public function store(Request $request)
    {
        $simpan = Obat::create($request->all());
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
        $data = Obat::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        // dd($request->all());
        $data = Obat::find($request->id);
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
        $data = Obat::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Data Berhasil Dihapus'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Dihapus'], 400);    
        }
    }
}
