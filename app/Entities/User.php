<?php

namespace ProjectRico\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function projects()
    {
        return $this->hasMany('ProjectRico\Entities\Project');
    }
    
    public function projectsMember()
    {
        return $this->belongsToMany(Project::class, 'project_members');
    }
}
