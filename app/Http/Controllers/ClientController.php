<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Repositories\ClientRepository;
use ProjectRico\Services\ClientService;

class ClientController extends Controller
{
    /**
     *
     * @var ClientRepository
     */
    private $repository;
    
    /**
     *
     * @var ClientService
     */
    private $service;
    
    /**
     * 
     * @param ClientRepository $repository
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, ClientService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->repository->all();
    }
    
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    
    public function show($id)
    {
        return $this->service->show($id);
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
