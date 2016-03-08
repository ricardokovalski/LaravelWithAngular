<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Services\ProjectService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use ProjectRico\Repositories\Criteria\Project\ProjectCriteria;

class ProjectController extends Controller
{    
    /**
     *
     * @var ProjectRepository
     */
    private $repository;
    
    /**
     *
     * @var use ProjectService
     */
    private $service;
    
    /**
     * 
     * @param ProjectRepository $repository
     * @param ProjectService $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function index()
    {
        //return $this->repository->with(['client','owner','notes'])->all();
        //$this->repository->pushCriteria(new ProjectCriteria());
        return $this->repository->scopeQuery(function($query){
            return $query->join('project_members', 'project_members.project_id', '=', 'id')
                        ->where('status', '=', 'F')
                        ->where('project_members.user_id', '=', '1')
                        ->orderBy('id','ASC'); 
        })->all();
    }
    
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    
    public function show($id)
    {
        
        if($this->checkProjectPermissions($id) == false)
        {
            return [
                'error' => 'Access Forbidden'
            ];
        }
        return $this->repository->with(['client','owner','notes'])->find($id);                
    }
    
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }
    
    public function destroy($id)
    {
        $this->repository->delete($id);
    }
    
    private function checkProjectOwner($porjectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        
        return $this->repository->isOwner($porjectId, $userId);        
    }
    
    private function checkProjectMember($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        
        return $this->repository->hasMember($projectId, $userId);
    }
    
    private function checkProjectPermissions($projectId)
    {
        if($this->checkProjectOwner($projectId) || $this->checkProjectMember($projectId))
        {
            return true;
        }
        return false;
    }
    
    
}
