<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function getBengkels (Request $request)
    {
        $radius = $request->rad ?? 10; // Jarak dalam kilometer
        $latitude = $request->lat;
        $longitude = $request->lng;
        $bengkels = Bengkel::selectRaw("*,
            (6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))
            AS distance")
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();

        return $bengkels;
    }
}
