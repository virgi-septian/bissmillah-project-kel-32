<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
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
}
