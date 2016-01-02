<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectTaskRepository;
use ProjectRico\Validators\ProjectTaskValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectTaskService
{
    
    /**
     *
     * @var ProjectTaskRepository
     */
    protected $repository;
    
    /**
     *
     * @var ProjectTaskValidator
     */
    protected $validator;
    
    /**
     * 
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskValidator $validator
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskValidator $validator)
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
    
    public function update($data, $id)
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

