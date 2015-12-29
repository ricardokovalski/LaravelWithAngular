<?php

namespace ProjectRico\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use ProjectRico\Repositories\ClientRepository;
use ProjectRico\Entities\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model() 
    {
        return Client::class;
    }
}

