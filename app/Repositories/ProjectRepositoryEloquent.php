<?php

namespace ProjectRico\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Entities\Project;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }
}

