<?php

namespace ProjectRico\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'description' => 'required',
        'progress' => 'required|max:100',
        'status' => 'required|(A,F,P)',
        'due_date' => 'required|date'
    ];
}

