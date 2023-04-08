<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function getBengkels (Request $request)
    {
        $bengkel = new Bengkel();
        return $bengkel->getBengkels($request->lat, $request->lng, $request->rad)->get();
    }
}
