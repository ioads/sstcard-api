<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AssinaturaRepository;
use App\Http\Repositories\ClienteRepository;

class AssinaturaController extends Controller
{
    private $assinaturaRepository;
    private $clienteRepository;

    public function __construct(AssinaturaRepository $assinaturaRepository, ClienteRepository $clienteRepository)
    {
        $this->assinaturaRepository = $assinaturaRepository;
        $this->clienteRepository = $clienteRepository;
    }

    public function index()
    {
        return $this->assinaturaRepository->all();
    }

    public function show(string $id)
    {
        return $this->assinaturaRepository->show($id);
    }

    public function store(Request $request)
    {
        $cliente_id = $this->clienteRepository->store($request->input('cliente'));
        $response = $this->assinaturaRepository->store($request->all());
        // $this->clienteRepository->clienteAssinatura($cliente_id, $response);
        return $response;
    }

    public function excel()
    {
        return $this->assinaturaRepository->excel();
    }

    public function pdf()
    {
        return $this->assinaturaRepository->pdf();
    }
}
