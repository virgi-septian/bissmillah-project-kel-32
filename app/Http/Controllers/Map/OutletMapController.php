<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OutletMapController extends Controller
{
    public function index()
    {
        return view('layouts.outlets.map');
    }
}
