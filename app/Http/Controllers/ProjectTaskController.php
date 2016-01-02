<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Repositories\ProjectTaskRepository;
use ProjectRico\Services\ProjectTaskService;

class ProjectTaskController extends Controller
{    
    /**
     *
     * @var ProjectTaskRepository
     */
    private $repository;
    
    /**
     *
     * @var use ProjectTaskService
     */
    private $service;
    
    /**
     * 
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }
    
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    
    public function show($id, $taskId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $taskId]);
    }
    
    public function update(Request $request, $id, $taskId)
    {
        return $this->service->update($request->all(), $taskId);
    }
    
    public function destroy($id, $taskId)
    {
        $this->repository->delete($taskId);
    }
}
