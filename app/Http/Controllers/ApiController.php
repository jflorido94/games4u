<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    //----Games

    public function games()
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "games";

        $params = [];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            //'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }

    public function GameId($id)
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "games/" . $id;

        $params = [];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            //'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }

    public function searchGame($string)
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "games";

        $params = [
            'search' => $string,
        ];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }

    public function platformGame($string)
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "games";

        $params = [
            'platforms' => $string,
        ];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }


    //Platforms

    public function platforms()
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "platforms";

        $params = [];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            //'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }

    public function platformId($id)
    {
        $client = new Client();
        $url = env('API_ENDPOINT') . "platforms/" . $id;

        $params = [];

        $headers = [
            'key' => env('KEY_API'),
        ];

        $response = $client->request('GET', $url, [
            //'query' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return dd(json_decode($response->getBody()));
        // return view('projects.apiwithkey', compact('responseBody'));
    }



}
