<?php

namespace App\Http\Repositories;

use App\Models\Venda;
use App\Models\Cliente;

class VendaRepository
{
    private $model;
    private $cliente;

    public function __construct(Venda $model, Cliente $cliente)
    {
        $this->model = $model;
        $this->cliente = $cliente;
    }

    public function all()
    {
        return $this->model->with('cliente')->get();
    }

    public function show(string $id)
    {
        return $this->model->find($id);
    }

    public function store(string $numero_prontuario, array $data)
    {
        $cliente = $this->cliente->where('numero_protocolo', $numero_prontuario)->first();
        if(!$cliente) {
            return response()->json(['success' => 'false', 'data' => 'Não existe cliente com este número de prontuário.']);
        }
        $data['cliente_id'] = $cliente->id;
        $data['plano_id'] = '1';
        return $this->model->create($data);
    }

    public function update(array $data, string $id)
    {
        $venda = $this->model->find($id);
        return $venda->update($data);
    }
}
