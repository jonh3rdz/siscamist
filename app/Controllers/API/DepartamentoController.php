<?php

namespace App\Controllers\API;

use App\Models\DepartamentoModel;
use CodeIgniter\RESTful\ResourceController;

class DepartamentoController extends ResourceController
{
    public function __construct() {
        $this->model = $this->setModel(new DepartamentoModel());
    }

    public function index()
    {
        $departamentos = $this->model->findAll();
        return $this->respond($departamentos);
    }

    public function create() {
        try {
            $departamento = $this->request->getJSON();
            if($this->model->insert($departamento)):
                $departamento->id = $this->model->insertID();
                return $this->respondCreated($departamento);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError('Ocurrió un error en el servidor');
        }
    }

    public function edit($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id valido');

            $departamento = $this->model->find($id);
            if($departamento == null)
                return $this->failNotFound(('No se ha encontrado un departamento con el id: '.$id));

            return $this->respond($departamento);
        } catch (\Exception $e) {
            return $this->failServerError('Ocurrió un error en el servidor');
        }
    }

    public function update($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id valido');

            $departamentoVerificado = $this->model->find($id);
            if($departamentoVerificado == null)
                return $this->failNotFound(('No se ha encontrado un departamento con el id: '.$id));

            $departamento = $this->request->getJSON();

            if($this->model->update($id, $departamento)):
                $departamento->id = $id;
                return $this->respondUpdated($departamento);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ocurrió un error en el servidor');
        }
    }

    public function delete($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id valido');

            $departamentoVerificado = $this->model->find($id);
            if($departamentoVerificado == null)
                return $this->failNotFound(('No se ha encontrado un departamento con el id: '.$id));



            if($this->model->delete($id)):
                return $this->respondDeleted($departamentoVerificado);
            else:
                return $this->failServerError('Ocurrió un error al intentar eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ocurrió un error en el servidor');
        }
    }
}
