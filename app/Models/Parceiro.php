<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;

    protected $table = 'parceiros';

    protected $fillable = [
        'user_id',
        'cnpj',
        'nome_fantasia',
        'razao_social',
        'celular',
        'telefone',
        'fax',
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
