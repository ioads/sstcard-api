<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\VendaRepository;

class VendaController extends Controller
{
    protected $vendaRepository;

    public function __construct(VendaRepository $vendaRepository)
    {
        $this->vendaRepository = $vendaRepository;
    }

    public function index()
    {
        return $this->vendaRepository->all();
    }

    public function show(string $id)
    {
        return $this->vendaRepository->show($id);
    }

    public function store(Request $request)
    {
        $numero_prontuario = $request->input('numero_prontuario');
        $data = $request->input('venda');
        return $this->vendaRepository->store($numero_prontuario, $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        return $this->vendaRepository->update($data, $id);
    }

    public function excel()
    {
        return $this->vendaRepository->excel();
        return Excel::download(new ParceiroExport, 'cliente.xlsx');
    }

    public function pdf()
    {
        return $this->vendaRepository->pdf();
        $parceiros = $this->parceiroRepository->all();
        $pdf = Pdf::loadView('pdf.parceiros', ['parceiros' => $parceiros]);
        return $pdf->download('parceiros.pdf');
    }
}
