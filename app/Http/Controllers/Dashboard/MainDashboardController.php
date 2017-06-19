<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainDashboardController extends Controller
{
    public function home()
    {
        return redirect()->route('dashboard.main');
    }

    public function dashboard()
    {
        return view('admin.dashboard.dashboard');

    }
}
