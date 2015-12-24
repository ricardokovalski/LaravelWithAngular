<?php

namespace ProjectRico;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nome', 'responsavel', 'email', 'telefone', 'endereco', 'observacoes'
    ];
}
