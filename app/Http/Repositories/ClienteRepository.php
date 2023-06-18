<?php

namespace App\Http\Repositories;

use App\Models\Cliente;
use App\Exports\ClienteExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function store($data)
    {
        return $this->model->create([
            'cpf' => str_replace('.', '', str_replace('-', '', $data['cpf'])),
            'rg' => str_replace('.', '', str_replace('-', '', $data['rg'])),
            'nome' => $data['nome'],
            'celular' => str_replace('(', '', str_replace(')', '', $data['ddd'])).str_replace('(', '', str_replace(')', '', str_replace(' ', '', str_replace('-', '', $data['celular'])))),
            'email' => $data['email'],
            'numero_protocolo' => str_replace('/', '', str_replace(':', '', str_replace(' ', '', date("d/m/Y H:i:s")))),
            'cep' => str_replace('-', '', $data['cep']),
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'referencia' => $data['referencia'],
            'cidade' => $data['cidade'],
            'uf' => $data['uf'],
            'status' => 1
        ])->id;
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

    public function clienteAssinatura($cliente_id, $response)
    {
        $this->model->clienteAssinatura()->create([
            'cliente_id' => $cliente_id,
            'api_assinatura_id' => $response->id,
            'api_plano_id' => $response->plan->id
        ]);
    }

    public function excel()
    {
        return Excel::download(new ClienteExport, 'cliente.xlsx');
    }

    public function pdf()
    {
        $clientes = $this->model->all();
        $pdf = Pdf::loadView('pdf.clientes', ['clientes' => $clientes]);
        return $pdf->download('clientes.pdf');
    }
}
