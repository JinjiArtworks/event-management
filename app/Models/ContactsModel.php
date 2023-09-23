<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactsModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'contacts';
    protected $primaryKey       = 'id_contacts';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $protectFields    = true;
    protected $allowedFields    = ['name_contacts', 'alias_contacts', 'info_contacts', 'groups_id', 'address', 'email', 'phone'];

    // Dates
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;

    function getAll()
    {
        $builder = $this->db->table('contacts');
        $query = $builder->select('*')->join('groups', 'groups.id_groups = contacts.groups_id')->get();
        return $query->getResult();
    }
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
