<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('layouts.map.index');
    }
}
