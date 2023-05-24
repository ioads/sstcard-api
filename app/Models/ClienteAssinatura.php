<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteAssinatura extends Model
{
    use HasFactory;

    protected $table = 'clientes_assinaturas';

    protected $fillable = [
        'cliente_id',
        'api_assinatura_id',
        'api_plano_id'
    ];
}
