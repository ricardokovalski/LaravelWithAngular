<?php

namespace ProjectRico\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nome', 'responsavel', 'email', 'telefone', 'endereco', 'observacoes'
    ];
    
    public function projects()
    {
        return $this->hasMany('ProjectRico\Entities\Project');
    }
}
