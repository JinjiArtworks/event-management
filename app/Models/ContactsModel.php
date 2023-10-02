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
    // protected $validationRules = [
    //     'groups_id'        => 'required',
    //     'name_contacts'        => 'required|min_length[3]',
    // ];
    // protected $validationMessages = [
    //     'groups_id' => [
    //         'required' => 'Grup belum dipilih',
    //     ],
    //     'name_contacts' => [
    //         'required' => 'Nama kontak wajib di isi',
    //         'min_length' => 'Nama kontak wajib 3 digit',
    //     ],
    // ];
    // protected $skipValidation     = false;
    function getAll()
    {
        $builder = $this->db->table('contacts');
        $query = $builder->select('*')->join('groups', 'groups.id_groups = contacts.groups_id')->get();
        return $query->getResult();
    }
    function getPaginated($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('groups', 'groups.id_groups = contacts.groups_id');
        if($keyword != null){
            $builder->like('name_contacts', $keyword);
            $builder->orlike('alias_contacts', $keyword);
            $builder->orlike('address', $keyword);
            $builder->orlike('phone', $keyword);
            $builder->orlike('email', $keyword);
            $builder->orlike('name_groups', $keyword);
        }
        return [
            'contacts' => $this->paginate($num),
            'pager' => $this->pager
        ];
    }
}
