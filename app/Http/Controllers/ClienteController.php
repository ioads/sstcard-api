<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ClienteRepository;

class ClienteController extends Controller
{
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function index()
    {
        return $this->clienteRepository->all();
    }

    public function show(string $id)
    {
        return $this->clienteRepository->show($id);
    }

    public function status(string $id)
    {
        return $this->clienteRepository->status($id);
    }

    public function consultaNumeroProntuario(string $numero_prontuario)
    {
        return $this->clienteRepository->consultaNumeroProntuario($numero_prontuario);
    }
}
