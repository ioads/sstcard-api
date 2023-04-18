<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CepController extends Controller
{
    public function cep(Client $client, string $cep) {
        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");

        return json_decode($response->getBody(), true);
    }
}
