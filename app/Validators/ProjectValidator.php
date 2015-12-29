<?php

namespace ProjectRico\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|numeric',
        'client_id' => 'required|numeric',
        'name' => 'required|max:255',
        'description' => 'required',
        'progress' => 'required|max:100',
        'status' => 'required',
        'due_date' => 'required|date'
    ];
}

