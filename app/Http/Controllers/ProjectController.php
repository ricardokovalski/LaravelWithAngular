<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Services\ProjectService;

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
        return $this->repository->with(['client','owner'])->all();
    }
    
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    
    public function show($id)
    {
        return $this->repository->with(['client','owner'])->find($id);
    }
    
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }
    
    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
