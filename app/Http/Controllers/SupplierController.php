<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index(Request $request){
        $data = Supplier::orderBy('suppliers.updated_at', 'DESC');
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

        return view('layouts.dashboards.owner.supplierHome');
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

        $simpan = Supplier::create($request->all());
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
        $data = Supplier::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Supplier::find($request->id);
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
        if(Auth::user()->isAbleTo('users-delete')){
            $data = Supplier::find($request->id);
            $simpan = $data->delete($request->all());
            if ($simpan) {
                return response()->json(['text' => 'Data Berhasil Dihapus'], 200);
            }
            else{
                return response()->json(['text' => 'Data Gagal Dihapus'], 400);    
            }
        }else{
            return response()->json(['text' => 'Anda Tidak Memiliki Akses'], 404);
        }
    }
}
