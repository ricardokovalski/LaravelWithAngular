<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Repositories\ProjectMemberRepository;
use ProjectRico\Services\ProjectMemberService;

class ProjectMemberController extends Controller
{    
    /**
     *
     * @var ProjectMemberRepository
     */
    private $repository;
    
    /**
     *
     * @var use ProjectMemberService
     */
    private $service;
    
    /**
     * 
     * @param ProjectMemberRepository $repository
     * @param ProjectMemberService $service
     */
    public function __construct(ProjectMemberRepository $repository, ProjectMemberService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function index($id)
    {
        return $this->service->allMembers($id);
    }
    
    public function store(Request $request)
    {
        return $this->service->addMember($request->all());
    }
    
    public function isMember($projectId, $memberId)
    {
        return $this->service->isMember($projectId, $memberId);
    }
    
    public function destroy($projectId, $memberId)
    {
        $this->service->removeMember($projectId, $memberId);
    }
}
