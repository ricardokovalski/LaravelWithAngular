<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;

use ProjectRico\Http\Controllers\Controller;
use ProjectRico\Services\ProjectFileService;
use ProjectRico\Repositories\ProjectFileRepository;

class ProjectFileController extends Controller
{

    /**
     * @var ProjectFileRepository
     */
    private $repository;
    
    /**
     *
     * @var ProjectFileService
     */
    private $service;
    
    /**
     * 
     * @param ProjectFileService $service
     * @param ProjectFileRepository $repository
     */
    public function __construct(ProjectFileService $service, ProjectFileRepository $repository) {
        $this->service = $service;
        $this->repository = $repository;
    }
    
    public function index($id){
        return $this->repository->findWhere(['project_id' => $id]);
    }
    
    public function store(Request $request){
        
        $file = $request->file('file');        
        $extension = $file->getClientOriginalExtension();
        
        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;
        
        return $this->service->createFile($data);
        
    }
    
    public function show($id, $fileId){
        return $this->repository->findWhere(['project_id'=>$id, 'id'=>$fileId]);
    }
    
    public function showFile($id, $fileId){
        
        $filePath = $this->service->getFilePath($fileId);
        $fileContent = file_get_contents($filePath);
        $file64 = base64_encode($fileContent);
        return [
            'file' => $file64,
            'size' => filesize($filePath),
            'name' => $this->service->getFileName($fileId)
        ];
    }
    
    public function update(Request $request, $id, $fileId){
        
        $data = $request->all();
        $data['project_id'] = $id;
        
        return $this->service->updateFile($data, $fileId);
    }
    
    public function destroy($id, $fileId){
        
        return $this->service->deleteFile($fileId);
    }
}
