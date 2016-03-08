<?php

namespace ProjectRico\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectMember extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'project_id', 'user_id'
    ];
    
//    public function projects()
//    {
//        return $this->hasMany(Project::class,'id','project_id');
//    }
    
    public function member()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
//    public function users()
//    {
//        return $this->hasMany(User::class,'id','user_id');
//    }

}
