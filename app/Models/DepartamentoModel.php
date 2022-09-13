<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartamentoModel extends Model
{
    protected $table            = 'tbl_departamentos';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre','area'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

     // Validation
     protected $validationRules      = [
        'nombre'    => 'required|min_length[3]|max_length[75]',
        'area'    => 'required|min_length[3]|max_length[75]',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
}