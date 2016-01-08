<?php

namespace ProjectRico\Transformers;

use ProjectRico\Entities\Client;
use League\Fractal\TransformerAbstract;

class ProjectClientTransformer extends TransformerAbstract
{
    
    public function transform(Client $client)
    {
        
        return [
            'client_id' => $client->id,
            'client' => $client->nome,
            'responsavel' => $client->responsavel,
            'email' => $client->email,
            'telefone' => $client->telefone,
            'endereco' => $client->endereco,
            'observacoes' => $client->observacoes,
        ];
        
    }
    
}

