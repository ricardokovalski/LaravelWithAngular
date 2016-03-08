<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectMemberRepository;
use ProjectRico\Validators\ProjectMemberValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectMemberService
{
    
    /**
     *
     * @var ProjectMemberRepository
     */
    protected $repository;
    
    /**
     *
     * @var ProjectMemberValidator
     */
    protected $validator;
    
    /**
     * 
     * @param ProjectMemberRepository $repository
     * @param ProjectMemberValidator $validator
     */
    public function __construct(ProjectMemberRepository $repository, ProjectMemberValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    public function addMember($data)
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
    
    public function removeMember($projectId,$memberId)
    {
        return $this->repository->deleteMemberOnProjectId($projectId, $memberId);
    }
    
    public function isMember($projectId,$memberId)
    {
        try {
            $quantidade = $this->repository->findWhere(['project_id' => $projectId, 'user_id' => $memberId]);
            
            if(count($quantidade) > 0){
                return ['isMember' => true];
            }else{
                return ['isMember' => false];
            }            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    
    public function allMembers($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }
}

