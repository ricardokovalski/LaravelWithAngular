<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectNoteRepository;
use ProjectRico\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
    
    /**
     *
     * @var ProjectNoteRepository
     */
    protected $repository;
    
    /**
     *
     * @var ProjectNoteValidator
     */
    protected $validator;
    
    /**
     * 
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteValidator $validator
     */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
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

