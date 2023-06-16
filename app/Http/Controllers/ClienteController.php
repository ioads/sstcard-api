<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ClienteRepository;
use App\Exports\ClienteExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function index()
    {
        return $this->clienteRepository->all();
    }

    public function show(string $id)
    {
        return $this->clienteRepository->show($id);
    }

    public function status(string $id)
    {
        return $this->clienteRepository->status($id);
    }

    public function consultaNumeroProntuario(string $numero_prontuario)
    {
        return $this->clienteRepository->consultaNumeroProntuario($numero_prontuario);
    }

    public function excel()
    {
        return Excel::download(new ClienteExport, 'cliente.xlsx');
    }

    public function pdf()
    {
        $clientes = $this->clienteRepository->all();
        $pdf = Pdf::loadView('pdf.clientes', ['clientes' => $clientes]);
        return $pdf->download('clientes.pdf');
    }
}
