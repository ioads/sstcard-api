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
}
