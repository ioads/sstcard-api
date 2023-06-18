<?php

namespace App\Http\Repositories;

use App\Http\Client\PagarMe;
use App\Exports\PlanoExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PlanoRepository
{
    protected $PagarMe;
    protected $Key;
    protected $EndPoint;

    public function __construct()
    {
        $this->Key = env('PAGARME_KEY');
        $this->EndPoint = 'plans';
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
            "amount" => $data['amount'],
            "days" => $data['days'],
            "name" => $data['name'],
            "trial_days" => $data['trial_days'],
            "payment_methods" => ["boleto", "credit_card"],
            "charges" => $data['charges'],
            "installments" => $data['installments'],
            "invoice_reminder" => $data['invoice_reminder']
        );
        $this->PagarMe->post($data);
        return json_decode($this->PagarMe->response());
    }

    public function excel()
    {        
        $this->PagarMe = new PagarMe($this->Key, $this->EndPoint);
        $this->PagarMe->get();

        return Excel::download(new PlanoExport(json_decode($this->PagarMe->response())), 'plano.xlsx');
    }

    public function pdf()
    {
        $this->PagarMe = new PagarMe($this->Key, $this->EndPoint);
        $this->PagarMe->get();
        
        $pdf = Pdf::loadView('pdf.planos', ['planos' => json_decode($this->PagarMe->response())]);
        return $pdf->download('planos.pdf');
    }
}
