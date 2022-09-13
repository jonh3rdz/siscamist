<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{
    use ResponseTrait;
    
    public function login()
    {
        try {
            //code...
        } catch (\Exception $e) {
            return $this->failServerError('Ocurrió un error en el servidor');
        }
    }
}
