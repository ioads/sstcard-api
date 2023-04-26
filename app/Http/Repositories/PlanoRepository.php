<?php

namespace App\Http\Repositories;

// use App\Models\Cliente;

class PlanoRepository
{
    // private $model;

    public function __construct()
    {
        // $this->model = $model;
    }

    public function all()
    {
        $cURLConnection = curl_init();

        $url = env('PAGARME_URL').'plans?api_key='.env('PAGARME_KEY');

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return response()->json(['success' => 'true', 'data' => json_decode($response)]);
    }

    public function show(string $id)
    {
        $cURLConnection = curl_init();

        $url = env('PAGARME_URL').'plans/'.$id.'?api_key='.env('PAGARME_KEY');

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return response()->json(['success' => 'true', 'data' => json_decode($response)]);
    }
}
