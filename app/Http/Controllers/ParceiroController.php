<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ParceiroRepository;
use App\Http\Repositories\UserRepository;
use App\Exports\ParceiroExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ParceiroController extends Controller
{
    private $clienteRepository;

    public function __construct(ParceiroRepository $parceiroRepository, UserRepository $userRepository)
    {
        $this->parceiroRepository = $parceiroRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->parceiroRepository->all();
    }

    public function show(string $id)
    {
        return $this->parceiroRepository->show($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $parceiro = $this->parceiroRepository->store($data);
        if($parceiro) {
            $password = Hash::make('123456');
            $this->userRepository->store($data);
        }
        return $parceiro;
    }

    public function status(string $id)
    {
        return $this->parceiroRepository->status($id);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        return $this->parceiroRepository->update($data, $id);
    }

    public function excel()
    {
        return Excel::download(new ParceiroExport, 'cliente.xlsx');
    }

    public function pdf()
    {
        $parceiros = $this->parceiroRepository->all();
        $pdf = Pdf::loadView('pdf.parceiros', ['parceiros' => $parceiros]);
        return $pdf->download('parceiros.pdf');
    }
}
