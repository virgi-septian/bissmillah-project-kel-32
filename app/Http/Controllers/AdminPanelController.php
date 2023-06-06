<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
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
        $data = User::all();
        if($request->ajax())
        {
            return DataTables::of($data)
            ->addColumn('aksi', function($data)
            {
                $button = ' <div class="d-flex"> ';

                $button .= ' <button id="'.$data->id.'" name="edit" data-bs-toggle="modal"
                data-bs-target="#modalCenter" class="edit btn btn-outline-success btn-sm me-1"><i class="bi bi-pencil-fill"></i></button> ';
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
        $user = User::findOrFail($id);
        $roles = [];

        foreach ($user->roles as $role) {
            $roles[] = $role->display_name;
        }

        return response()->json(['user' => $user, 'roles' => $roles]);
    }

    public function edit(AdminPanel $adminPanel)
    {
        //
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'role' => 'required',
        ];
        

        $text = [
            'name.required' => 'Kolom name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
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
        $save =  $user->update($data);
        if($save){
            $user->syncRoles(explode(',', $request->role)); 
            return response()->json(['text' => 'Data Berhasil Diedit'], 200);
        }
    }

    public function destroy(AdminPanel $adminPanel)
    {
        //
    }
}
