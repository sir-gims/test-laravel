<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Autheapi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $client = new \GuzzleHttp\Client();
        $request->clData = $client->request('GET',
            'https://embedsocial.com/admin/v2/api/reviews?reviews_ref=0d44e0b0a245de6fc9651f870d8b4
4efc4653184',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer escfe7569d859dd903d77664e9983edf'
                ]
            ]
        );


        return $next($request);
    }
}
