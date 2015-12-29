<?php

namespace ProjectRico\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'progress', 'status', 'due_date'
    ];
    
    public function owner()
    {
        return $this->belongsTo('ProjectRico\Entities\User');
    }
    
    public function client()
    {
        return $this->belongsTo('ProjectRico\Entities\Client');
    }
    
}
