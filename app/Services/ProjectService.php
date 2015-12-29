<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    
    /**
     *
     * @var ProjectRepository
     */
    protected $repository;
    
    /**
     *
     * @var ProjectValidator
     */
    protected $validator;
    
    /**
     * 
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    public function create($data)
    {
        try {  
            
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    
    public function uodate($data, $id)
    {
        try {
            
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    
}

