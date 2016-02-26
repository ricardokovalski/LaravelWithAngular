<?php

namespace ProjectRico\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable = [
        'name', 'description', 'extension', 'project_id'
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function getFileName()
    {
        return $this->id . '.' . $this->extension;
    }
    
}
