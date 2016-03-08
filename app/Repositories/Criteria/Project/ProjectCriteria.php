<?php

namespace ProjectRico\Repositories\Criteria\Project;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class ProjectCriteria implements CriteriaInterface{
    
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->join('project_members', 'project_members.project_id', '=', 'id')
                        ->where('status', '=', 'F')
                        ->where('project_members.user_id', '=', '1')
                        ->orderBy('id','ASC');      
        
        return $model;
    }
    
}