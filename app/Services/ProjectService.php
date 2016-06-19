<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ProjectRepository;
use ProjectRico\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ProjectService
{
    /**
     *
     * @var ProjectRepository
     */
    protected $repository;
    
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
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
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
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message' => 'Projeto não pode ser atualizado.'];
        }
    }

    public function show($id){

        try{
            return $this->repository->with(['client','owner','notes'])->find($id);
        }catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'projeto não encontrado'
            ];
        }
    }

    public function destroy($id){

        try {
            $this->repository->delete($id);
            return ['success'=>true, 'message' => 'Projeto deletado com sucesso!'];
        } catch (QueryException $e) {
            return ['error'=>true, 'message' => 'Projeto não pode ser apagado pois existe um ou mais clientes vinculados a ele.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message' => 'Projeto não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'message' => 'Ocorreu algum erro ao excluir o projeto.'];
        }

    }
    
}

