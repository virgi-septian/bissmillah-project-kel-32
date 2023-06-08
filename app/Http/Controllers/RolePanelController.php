<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RolePanelController extends Controller
{
    public function index(Request $request){
        $data = Role::all();
        if($request->ajax())
        {
            return DataTables::of($data)
            ->addColumn('aksi', function($data)
            {
                $button = ' <div class="d-flex"> ';

                $button .= ' <a href="#edit_role_form" id="'.$data->id.'" data-target="#edit_role_form" name="edit" class="edit_role_management text-bg-success btn btn-outline-success btn-sm me-1"><i class="bi bi-pencil-fill "></i></a> ';
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

    public function reload() 
    {
        $permissions = Permission::all();
        return response()->json(['data_permission' => $permissions]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles',
            'description' => 'required',
            'roleAkses' => 'required',
        ];
            
        $text = [
            'name.required' => 'Kolom nama role tidak boleh kosong',
            'name.unique' => 'Kolom nama role sudah ada',
            'display_name.required' => 'Display name tidak boleh kosong',
            'display_name.unique' => 'Display name sudah ada',
            'description.required' => 'Description tidak boleh kosong',
            'roleAkses.required' => 'Tolong Isi Permission',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);

        if ($validasi->fails()) {
            return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422); 
        }

        $data = new Role();
        $data->name = $request->name;
        $data->display_name = $request->display_name;
        $data->description = $request->description;
        $save = $data->save();
        $dataId = $data->id;
        if ($save) {
            $roleAkses = $request->roleAkses;
            
            foreach ($roleAkses as $permissionId) {
                $permission = Permission::find($permissionId);
                
                if ($permission) {
                    $data->attachPermission($permission);
                }
            }

            return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
        } else {
            $hapus = Role::findOrFail($dataId);
            $hapus->delete();
            return response()->json(['text' => 'Data Berhasil Gagal Disimpan'], 422);
        }
    }

    public function infoRole(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        $permissions = Permission::all();
        $keys = [];
        foreach($role->permissions as $key){
            array_push($keys, $key);
        }
        return response()->json(['role' => $role, 'permission' => $keys, 'cek' => $permissions]);

    }

    public function update(Request $request){
        $id = $request->id;
        $data = Role::findOrFail($id);
        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'roleAkses' => 'required',
        ];

        $text = [
            'name.required' => 'Kolom nama role tidak boleh kosong',
            'name.unique' => 'Kolom nama role sudah ada',
            'display_name.required' => 'Display name tidak boleh kosong',
            'display_name.unique' => 'Display name sudah ada',
            'description.required' => 'Description tidak boleh kosong',
            'roleAkses.required' => 'Tolong Isi Permission',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);

        if ($validasi->fails()) {
            return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422); 
        }
        $data->name = $request->name;
        $data->display_name = $request->display_name;
        $data->description = $request->description;
        $data->syncPermissions($request->roleAkses);
        $save = $data->update();
        if ($save) {
            return response()->json(['text' => 'Data Berhasil Edit'], 200);
        } else {
            return response()->json(['text' => 'Data Berhasil Gagal Disimpan'], 422);
        }
    }
}
