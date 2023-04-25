<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [
        'cliente_id',
        'plano_id',
        'valor_bruto',
        'valor_desconto',
        'valor_liquido',
        'data'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
