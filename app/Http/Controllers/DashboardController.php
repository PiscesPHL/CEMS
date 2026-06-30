<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Notice Request is gone

class DashboardController extends Controller
{
    public function index()
    {
        // Get the role of the currently logged-in user and make it lowercase
        $role = strtolower(Auth::user()->role);

        // Return the dashboard view and pass the role variable to it
        return view('dashboard', compact('role'));
    }
}