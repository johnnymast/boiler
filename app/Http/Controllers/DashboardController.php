<?php

namespace App\Http\Controllers;

use App\Facades\SystemMenu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.dashboard');
    }
}
