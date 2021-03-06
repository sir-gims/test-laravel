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

        $response = $request->clData->getBody();
        $json = collect(json_decode($response,true));
        $reviews = collect($json->slice(1)['reviews']);

        $filtered = $reviews->filter(function ($value, $key) {
            return data_get($value, 'rating') >= 3;
        });

//        dd($filtered);
//        return json_defiltered((string)$response->getBody ());

        return view('welcome', compact('reviews'));
    }

    public function filter(Request $request){
        //Assign all inputs on a var
        $input = $request->all();
        $rating = (int)$input['min-rating'];
        $response = $request->clData->getBody();
        $json = collect(json_decode($response,true));
        $reviews = collect($json->slice(1)['reviews']);

        $filtered = $reviews->filter(function ($value, $key) use ($rating) {
            return data_get($value, 'rating') >= $rating;
        });

        $options = [];

        if ($input['text'] == 'yes'){
            array_push($options,['reviewText','desc']);
        }
//        else if ($input['text'] == 'no'){
//            array_push($options,['reviewText','asc']);
//        }
        if ($input['rating'] == 'high'){
            array_push($options,['rating',SORT_NATURAL,'desc']);
        } else if ($input['rating'] == 'low') {
            array_push($options,['rating',SORT_NATURAL,'asc']);
        }
        if ($input['date'] == 'newest'){
            array_push($options,['reviewCreatedOnTime','desc']);
        } else if ($input['date'] == 'oldest') {
            array_push($options,['reviewCreatedOnTime','asc']);
        }

//        dd($options);
        $filtered = $filtered
            ->sortBy($options);


//        dd($input);
        return  view('welcome',compact('filtered'));
    }

}
