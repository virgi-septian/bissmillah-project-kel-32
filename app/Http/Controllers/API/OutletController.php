<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\OutletResource;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index(Request $request)
    {
        $outlet = Outlet::all();
        $geoJSONdata = $outlet->map(function ($outlet) {
            return [
                'type' => 'feature',
                'properties' => new OutletResource($outlet),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $outlet->longitude,
                        $outlet->latitude,
                    ], 
                ],
            ];
        });
        return response()->json([
            'type' => 'FeatureCollection',
            'feature' => $geoJSONdata,
        ]);
    }

}
