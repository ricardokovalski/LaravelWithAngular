<?php

namespace ProjectRico\Transformers;

use ProjectRico\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    
    public function transform(User $member)
    {
        
        return [
            'member_id' => $member->id,
            'member' => $member->name,
        ];        
    }
    
}

