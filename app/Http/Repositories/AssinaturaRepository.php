<?php

namespace App\Http\Repositories;

use App\Http\Client\PagarMe;
use App\Models\Cliente;

class AssinaturaRepository
{
    protected $PagarMe;
    protected $Key;
    protected $EndPoint;
    protected $Cliente;

    public function __construct(Cliente $cliente)
    {
        $this->Key = env('PAGARME_KEY');
        $this->EndPoint = 'subscriptions';
        $this->Cliente = $cliente;
    }

    public function all()
    {        
        $this->PagarMe = new PagarMe($this->Key, $this->EndPoint);
        $this->PagarMe->get();

        return response()->json(['success' => 'true', 'data' => json_decode($this->PagarMe->response())]);
    }

    public function show(string $id)
    {
        $this->PagarMe = new PagarMe($this->Key, $this->EndPoint);
        $this->PagarMe->get($id);

        return response()->json(['success' => 'true', 'data' => json_decode($this->PagarMe->response())]);
    }

    public function store($data)
    {
        $this->PagarMe = new PagarMe($this->Key, $this->EndPoint);
        
        $data = array(
            "plan_id" => $data['id_plano'],
            "payment_method" => 'credit_card',
            "card_number" => str_replace(' ', '', $data['cartao']['cartao_numero']),
            "card_cvv" => $data['cartao']['cartao_cvv'],
            "card_holder_name" => $data['cartao']['cartao_nome'],
            "card_expiration_date" => str_replace('/', '', $data['cartao']['cartao_validade']),
            "customer" => array(
                "email" => $data['cliente']['email'],
                "name" => $data['cliente']['nome'],
                "document_number" => $data['cliente']['cpf'],
                "address" => array(
                    "street" => $data['cliente']['logradouro'],
                    "street_number" => $data['cliente']['numero'],
                    "complementary" => $data['cliente']['complemento'],
                    "neighborhood" => $data['cliente']['bairro'],
                    "zipcode" => $data['cliente']['cep']
                ),
                "phone" => array(
                    "ddd" => str_replace('(', '', str_replace(')', '', $data['cliente']['ddd'])),
                    "number" => str_replace('-', '', $data['cliente']['celular'])
                ),
                "gender" => $data['cliente']['sexo'],
                "born_at" => $data['cliente']['data_nascimento']
            )
        );
        $this->PagarMe->post($data);
        return json_decode($this->PagarMe->response());
    }
}
