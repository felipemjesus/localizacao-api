<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->query();

        $response = \GoogleMaps::load('geocoding')
            ->setParamByKey('latlng', "{$params['latitude']},{$params['longitude']}")
            ->get('results');

        $address = array_shift($response['results']);

        return [
            'position' => $address['formatted_address']
        ];
    }
}
