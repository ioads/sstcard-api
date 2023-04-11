<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillables = [
        'nome',
        'celular',
        'email',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'referencia',
        'cidade',
        'uf',
        'status'
    ];
}
