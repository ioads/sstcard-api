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
        // $this->clienteRepository->store($request->input('cliente'));
        return $this->assinaturaRepository->store($request->all());
    }
}
