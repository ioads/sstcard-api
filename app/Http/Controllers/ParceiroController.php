<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ParceiroRepository;
use App\Http\Repositories\UserRepository;

class ParceiroController extends Controller
{
    private $clienteRepository;

    public function __construct(ParceiroRepository $parceiroRepository, UserRepository $userRepository)
    {
        $this->parceiroRepository = $parceiroRepository;
        $this->userRepository = $userRepository;
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
        $parceiro = $this->parceiroRepository->store($data);
        if($parceiro) {
            $password = Hash::make('123456');
            $this->userRepository->store($data);
        }
        return $parceiro;
    }

    public function status(string $id)
    {
        return $this->parceiroRepository->status($id);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        return $this->parceiroRepository->update($data, $id);
    }
}
