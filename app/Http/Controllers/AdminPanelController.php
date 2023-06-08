<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all(); 
        $permissions = Permission::all();
        $user = User::all();
        if ($request->ajax()) {
            return DataTables::of($user)
                ->addColumn('aksi', function ($user) {
                    $button = '<div class="d-flex">';
                    $button .= '<button id="' . $user->id . '" name="edit" data-bs-toggle="modal" data-bs-target="#modalCenter" class="edit btn btn-outline-success btn-sm me-1"><i class="bi bi-pencil-fill"></i></button>';
                    $button .= '<button id="' . $user->id . '" name="hapus_usermanagement" class="hapus_usermanagement btn btn-outline-danger btn-sm me-1"><i class="bi bi-trash-fill"></i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }
        
        return view('layouts.dashboards.owner.user-management.index', compact('permissions', 'roles'));
    }

    public function reload()
    {
        $roles = Role::all();
        return response()->json(['data_role' => $roles]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|unique:users',
            'role' => 'required',
        ];

        $text = [
            'name.required' => 'Kolom name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'password.unique' => 'Password sudah terdaftar',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);

        if($validasi->fails()){
            return response()->json(['success' => 0,'text' => $validasi->errors()->first()], 422); 
        }

        $data = New User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $save = $data->save();
        
        if ($save) {
            $data->attachRole($request->role);
            $data->roles->each(function ($role) use ($data) {
                $data->syncPermissions($role->permissions);
            });
            return response()->json(['text' => 'Data Berhasil Disimpan'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Disimpan'], 422);    
        }
    }

    public function show(AdminPanel $adminPanel)
    {
        //
    }

    public function getRole(Request $request)
    {
        $id = $request->id;
        $roles = Role::all();
        $user = User::findOrFail($id);
        $roles_check = [];
        $role_name = [];
        $permit = [];

        foreach ($user->roles as $role) {
            $role_name[] = $role->display_name;
            $roles_check[] = $role->id;
            foreach ($user->permissions as $key) {
                array_push($permit, $key);
            }
        }

        return response()->json(['user' => $user, 'role_name' => $role_name, 'roles' => $roles, 'roles_check' => $roles_check,'permit' => $permit]);
    }

    public function edit(AdminPanel $adminPanel)
    {
        //
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];
        

        $text = [
            'name.required' => 'Kolom name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'role.required' => 'Role tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);

        if($validasi->fails()){
            return response()->json(['success' => 0,'text' => $validasi->errors()->first()], 422); 
        }
        $id = $request->id;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $user = User::findOrFail($id);

        $selectedRoles = explode(',', $request->role);

        $selectedPermissions = [];
        foreach ($selectedRoles as $roleId) {
            $role = Role::find($roleId);
            if ($role) {
                $selectedPermissions = array_merge($selectedPermissions, $role->permissions->pluck('id')->toArray());
            }
        }
        $user->syncPermissions($selectedPermissions);

        $save = $user->update($data);

        if ($save) {
            $user->syncRoles($selectedRoles);
            return response()->json(['text' => 'Data Berhasil Diedit'], 200);
        }

    }

    public function destroy(Request $request)
    {
        $data = User::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Data Berhasil Dihapus'], 200);
        }
        else{
            return response()->json(['text' => 'Data Gagal Dihapus'], 400);    
        }
    }
}
