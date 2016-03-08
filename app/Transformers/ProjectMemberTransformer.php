<?php

namespace ProjectRico\Transformers;

use ProjectRico\Entities\ProjectMember;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'usuario'
    ];
    
    public function transform(ProjectMember $member)
    {        
        return [
            //'member_id' => $member->user_id,
            'project_id' => $member->project_id,
        ];        
    }
    
    public function includeUsuario(ProjectMember $member)
    {
        return $this->item($member->member, new UserTransformer());
    }
    
}

