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
        $user = $this->userRepository->store($data);
        if($user) {
            $this->parceiroRepository->store($data, $user);
        }
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

    public function excel()
    {
        return $this->parceiroRepository->excel();
    }

    public function pdf()
    {
        return $this->parceiroRepository->pdf();
    }
}
