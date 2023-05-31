<?php

namespace App\Http\Controllers;

use App\Models\Heroarea;
use App\Models\KategoriProduk;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');

    }
}