<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main()
    {
        return view('dashboard.user');
    }

    public function mainAdmin()
    {
        return view('dashboard.admin');
    }
}
