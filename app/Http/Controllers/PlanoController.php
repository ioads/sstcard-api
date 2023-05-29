<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\PlanoRepository;

class PlanoController extends Controller
{
    private $planoRepository;

    public function __construct(PlanoRepository $planoRepository)
    {
        $this->planoRepository = $planoRepository;
    }

    public function index()
    {
        return $this->planoRepository->all();
    }

    public function show(string $id)
    {
        return $this->planoRepository->show($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->planoRepository->store($data);
    }
}
