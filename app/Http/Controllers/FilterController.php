<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    // basic index func
    public function index(Request $request){

        $response = $request->clData->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        $json = collect(json_decode($response,true));
        $reviews = collect($json->slice(1)['reviews']);

        $filtered = $reviews->filter(function ($value, $key) {
            return data_get($value, 'rating') > 3;
        });

        dd($filtered);
//        return json_decode((string)$response->getBody ());

        return view('welcome', compact('json'));
    }

    public function filter(Request $request){
        //Assign all inputs on a var
        $input = $request->all();

        dd($input);
    }

}
