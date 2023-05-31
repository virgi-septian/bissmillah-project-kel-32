<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('owner')) {
            return view('layouts.dashboards.owner.dashboard');
        }
        elseif (Auth::user()->hasRole('gudang')) {
            return view('layouts.dashboards.gudang.dashboard');
        }
        elseif (Auth::user()->hasRole('kasir')) {
            return view('layouts.dashboards.kasir.dashboard');
        }
        else {
            return view('layouts.dashboards.user.dashboard');
        }
    }
}