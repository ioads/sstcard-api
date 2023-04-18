<?php

namespace App\Http\Repositories;

use App\Models\Cliente;

class ClienteRepository
{
    private $model;

    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function show(string $id)
    {
        return $this->model->find($id);
    }

    public function status(string $id)
    {
        $cliente = $this->model->find($id);
        $cliente->status = !$cliente->status;
        return $cliente->save();
    }
}
