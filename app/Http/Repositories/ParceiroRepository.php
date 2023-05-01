<?php

namespace App\Http\Repositories;

use App\Models\Parceiro;

class ParceiroRepository
{
    private $model;

    public function __construct(Parceiro $model)
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

    public function store(array $data)
    {
        $data['user_id'] = 1;
        $data['status'] = 1;
        return $this->model->create($data);
    }

    public function status(string $id)
    {
        $parceiro = $this->model->find($id);
        $parceiro->status = !$parceiro->status;
        return $parceiro->save();
    }

    public function update(array $data, string $id)
    {
        $parceiro = $this->model->find($id);
        return $parceiro->update($data);
    }
}
