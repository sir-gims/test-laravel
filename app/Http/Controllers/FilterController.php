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

        $response = $request->clData->getBody()->getContents(); // '{"id": 1420053, "name": "guzzle", ...}'
        $json = json_decode($response,true);
        dd($response);
//        return json_decode((string)$response->getBody ());

        return view('welcome', compact('response'));
    }
}
