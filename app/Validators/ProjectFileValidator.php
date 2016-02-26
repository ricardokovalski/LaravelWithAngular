<?php

namespace ProjectRico\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required', 
        'description' => 'required|min:3|max:255',
        'extension' => 'in:png,jpg,jpeg,pdf'
    ];
}

