<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexManager()
    {
        return view('dashboard-manager'); // Pastikan ini mengarah ke 'dashboard.blade.php'
    }

    public function indexAdmin()
    {
        return view('dashboard-admin');
    }
}