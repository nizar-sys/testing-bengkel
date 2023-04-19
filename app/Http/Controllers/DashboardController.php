<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function show ()
    {
        $bengkel = Bengkel::all();

        return view('dashboard.databengkel', [
            'bengkels' => $bengkel
        ]);
    }
}
