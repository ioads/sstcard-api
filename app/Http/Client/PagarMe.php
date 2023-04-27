<?php

namespace App\Http\Client;

class PagarMe
{
    protected $ApiKey;
    protected $EndPoint;
    protected $Curl;
    protected $Response;

    public function __construct(string $ApiKey, string $EndPoint)
    {
        $this->ApiKey = $ApiKey;
        $this->EndPoint = $EndPoint;
        $this->Curl = curl_init();
    }

    public function get(string $id = null)
    {
        curl_setopt($this->Curl, CURLOPT_URL, env('PAGARME_URL').$this->EndPoint.($id ? '/'.$id : '').'?api_key='.$this->ApiKey);
        curl_setopt($this->Curl, CURLOPT_RETURNTRANSFER, true);
        $this->execute();
    }

    public function post(array $params)
    {
        curl_setopt($this->Curl, CURLOPT_URL, env('PAGARME_URL').$this->EndPoint.'?api_key='.$this->ApiKey);
        curl_setopt($this->Curl, CURLOPT_POST, true);
        curl_setopt($this->Curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($this->Curl, CURLOPT_RETURNTRANSFER, true);
        $this->execute();
    }

    public function execute()
    {
        $this->Response = curl_exec($this->Curl);
    }

    public function response()
    {
        return $this->Response;
    }
}