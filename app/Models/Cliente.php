<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'cpf',
        'rg',
        'nome',
        'celular',
        'email',
        'numero_protocolo',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'referencia',
        'cidade',
        'uf',
        'status'
    ];

    public function clienteAssinatura()
    {
        return $this->hasMany(ClienteAssinatura::class);
    }
}
