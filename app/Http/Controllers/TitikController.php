<?php

namespace App\Http\Controllers;

use App\Models\Titik;
use Illuminate\Http\Request;

class TitikController extends Controller
{
    
    public function index(){
        return view('layouts.map.index');
    }

    public function titik(){
        $result = Titik::all();
        return json_encode($result); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Titik $titik)
    {
        //
    }

    public function edit(Titik $titik)
    {
        //
    }

    public function update(Request $request, Titik $titik)
    {
        //
    }

    public function destroy(Titik $titik)
    {
        //
    }
}
