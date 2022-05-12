<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
