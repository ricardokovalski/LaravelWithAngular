<?php

namespace ProjectRico\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ProjectRico\Repositories\ProjectMemberRepository;
use ProjectRico\Entities\ProjectMember;

/**
 * Class ProjectMemberRepositoryEloquent
 * @package namespace ProjectRico\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements ProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
