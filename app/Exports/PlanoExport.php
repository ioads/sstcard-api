<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class PlanoExport implements FromArray
{
    protected $planos;

    public function __construct(array $planos)
    {
        $this->planos = $planos;
    }

    public function array(): array
    {
        return $this->planos;
    }
}
