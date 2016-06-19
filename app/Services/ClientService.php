<?php

namespace ProjectRico\Services;

use ProjectRico\Repositories\ClientRepository;
use ProjectRico\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientService
{
    /**
     *
     * @var ClientRepository
     */
    protected $repository;
    
    /**
     * 
     * @param ClientValidator $validator
     */
    protected $validator;
    
    public function __construct(ClientRepository $repository, ClientValidator $validator)
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
        }catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message' => 'Cliente não pode ser atualizado.'];
        }
        
    }

    public function show($id){

        try{
            return $this->repository->find($id);
        }catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Cliente não encontrado'
            ];
        }
    }

    public function destroy($id){

        try {
            $this->repository->delete($id);
            return ['success'=>true, 'message' => 'Cliente deletado com sucesso!'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message' => 'Cliente não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'message' => 'Ocorreu algum erro ao excluir o cliente.'];
        }

    }
}

