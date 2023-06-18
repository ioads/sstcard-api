<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class AssinaturaExport implements FromArray
{
    protected $assinaturas;

    public function __construct(array $assinaturas)
    {
        $this->assinaturas = $assinaturas;
    }

    public function array(): array
    {
        return $this->assinaturas;
    }
}
