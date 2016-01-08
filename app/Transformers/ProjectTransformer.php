<?php

namespace ProjectRico\Transformers;

use ProjectRico\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    
    protected $defaultIncludes = [
        'client', 'members'
    ];

    public function transform(Project $project)
    {
        
        return [
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'owner_id' => $project->owner_id,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];        
    }
    
    public function includeClient(Project $project)
    {
        $client = $project->client;
        
        return $this->item($client, new ProjectClientTransformer);
    }
    
    public function includeMembers(Project $project)
    {
        $members = $project->members;
        
        return $this->collection($members, new ProjectMemberTransformer);
    }
    
}

