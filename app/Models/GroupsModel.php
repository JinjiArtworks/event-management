<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'groups';
    protected $primaryKey       = 'id_groups';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $protectFields    = true;
    protected $allowedFields    = ['name_groups','info_groups'];
    
    // Dates
    protected $useTimestamps = true;
    protected $useSoftDeletes   = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
