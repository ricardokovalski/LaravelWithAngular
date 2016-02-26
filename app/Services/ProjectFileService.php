<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Repositories\ProjectFileRepository;
use ProjectRico\Validators\ProjectFileValidator;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class ProjectFileService
{

    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     *
     * @var ProjectRepository
     */
    protected $projectRepository;
    
    /**
     *
     * @var ProjectFileRepository 
     */
    protected $projectFileRepository;

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
    public function __construct(ProjectRepository $projectRepository, 
                                ProjectFileRepository $projectFileRepository,
                                ProjectFileValidator $validator, 
                                Filesystem $filesystem, Storage $storage)
    {
        $this->projectRepository = $projectRepository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
        $this->projectFileRepository = $projectFileRepository;
    }
    
    public function createFile($data) {
        
        try{
            
            $this->validator->with($data)->passesOrFail();
            
            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            $projectFile = $project->files()->create($data);
            $this->storage->put($projectFile->getFileName(), $this->filesystem->get($data['file']));
            return $projectFile;
        } catch (ValidatorException $e) {
            return [
                "sucess" => false,
                "message" => $e->getMessageBag()
            ];
        }
    }
    
    public function updateFile($data, $id){
        
        try{
            
            $this->validator->with($data)->passesOrFail();
            return $this->projectFileRepository->update($data, $id);
            
        } catch (ValidatorException $e) {
            return [
                "sucess" => false,
                "message" => $e->getMessageBag()
            ];
        }
    }
    
    public function getFilePath($id){
        
        $projectFile = $this->projectFileRepository->skipPresenter()->find($id);
        return $this->getBaseUrl($projectFile);
    }
    
    public function getFileName($id)
    {
        $projectFile = $this->projectFileRepository->skipPresenter()->find($id);
        return $projectFile->getFileName();
    }
    
    public function getBaseUrl($projectFile){
        
        switch ($this->storage->getDefaultDriver()){
            
            case 'local':
                $retorno = $this->storage->getDriver()->getAdapter()->getPathPrefix().'/'.$projectFile->getFileName();
                break;
        }
        return $retorno;
    }
    
    public function deleteFile($id){
        
        try{
            
            $projectFile = $this->projectFileRepository->skipPresenter()->find($id);
            if($this->storage->exists($projectFile->getFileName())){
                $this->storage->delete($projectFile->getFilename());
                $this->projectFileRepository->delete($id);
            }
            return [
                "error" => false,
                "message" => "Arquivo deletado."
            ];
            
        } catch (ValidatorException $e) {
            return [
                "sucess" => false,
                "message" => $e->getMessageBag()
            ];
        }
    }
    
}

