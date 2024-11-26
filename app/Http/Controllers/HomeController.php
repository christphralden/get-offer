<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

// refactored

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'isAuthenticated' => Auth::check(),
            'role' => Auth::check() ? Auth::user()->role : null,
        ]);
    }
}
