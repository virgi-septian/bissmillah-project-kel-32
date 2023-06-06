<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Matcher\Type;
use Yajra\DataTables\Facades\DataTables;

class permissionPanelController extends Controller
{
    public function index(Request $request)
    {
        $data = Permission::all();
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

        return view('layouts.dashboards.owner.user-management.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'hakAkses' => 'required',
        ];
            
        $text = [
            'name.required' => 'Kolom nama permission tidak boleh kosong',
            'display_name.required' => 'Display name tidak boleh kosong',
            'description.required' => 'Description tidak boleh kosong',
            'hakAkses.required' => 'Tolong Isi Permission',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);

        if ($validasi->fails()) {
            return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422); 
        }

        if ($request->hakAkses >= 1) {
            $save = true;

            foreach ($request->hakAkses as $item) {
                $existingPermissionName = Permission::where('name', $item . '-' . $request->name)->first();

                if ($existingPermissionName) {
                    return response()->json(['success' => 0, 'text' => 'Kolom Name Permission sudah ada'], 422);
                }
                
                $existingPermissionDisplayName = Permission::where('display_name', $item . ' ' . $request->display_name)->first();

                if ($existingPermissionDisplayName) {
                    return response()->json(['success' => 0, 'text' => 'Kolom Display Name Permission sudah ada'], 422);
                }

                $data = new Permission();
                $data->name = $item . '-' . $request->name;
                $data->display_name = $item . ' ' . $request->display_name;
                $data->description = $request->description;
                $save = $data->save();
            }

            if ($save) {
                return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
            } else {
                return response()->json(['text' => 'Data Berhasil Gagal Disimpan'], 422);
            }
        }
    }
}
