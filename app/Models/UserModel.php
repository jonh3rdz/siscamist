<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    //protected $DBGroup          = 'default';
    protected $table            = 'tbl_users';
    protected $primaryKey       = 'id';
    //protected $useAutoIncrement = true;
    //protected $insertID         = 0;
    protected $returnType       = 'array';
    //protected $useSoftDeletes   = false;
    //protected $protectFields    = true;
    protected $allowedFields    = ['nombre','apellido','email','password'];

    // Dates
    protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nombre'        => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido'      => 'required|alpha_space|min_length[3]|max_length[75]',
        'email'         => 'required|valid_email|max_length[75]',
        'password'      => 'required|min_length[8]|max_length[75]',
    ];
    protected $validationMessages   = [
        'email'     => [
            'valid_email'   => 'Por favor, ingresar un email valido'
        ]
    ];

    protected $skipValidation       = false;
}
