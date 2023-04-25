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

    public function consultaNumeroProntuario(string $numero_prontuario)
    {
        $cliente = $this->model->where('numero_protocolo', '=', $numero_prontuario)->first();
        if(!$cliente) {
            return response()->json(['success' => 'false', 'data' => 'Não existe cliente com este número de prontuário.']);
        }   
        if($cliente->status == 1) {
            return response()->json(['success' => 'true', 'data' => 'O cliente está ativo.']);
        }
        return response()->json(['success' => 'false', 'data' => 'O cliente está inativo']);
    }
}
