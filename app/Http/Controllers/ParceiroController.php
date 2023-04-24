<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ParceiroRepository;

class ParceiroController extends Controller
{
    private $clienteRepository;

    public function __construct(ParceiroRepository $parceiroRepository)
    {
        $this->parceiroRepository = $parceiroRepository;
    }

    public function index()
    {
        return $this->parceiroRepository->all();
    }

    public function show(string $id)
    {
        return $this->parceiroRepository->show($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->parceiroRepository->store($data);
    }
}
