<?php

namespace App\Http\Controllers;

use App\Facades\SystemMenu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        SystemMenu::help();
        return view('dashboard.dashboard');
    }
}
