<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Logic for the admin dashboard can be added here
        return view('admin.dashboard');
    }
}
