<?php

namespace App\Controllers;

use App\Models\GroupsModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Groups extends ResourcePresenter
// gunakan resoruces presenter
{
    protected $groupsModel;
    // protected $helpers = ['custom']; / gunakan ini jika tidak extends ke base controller untuk mengakses function pada helper.` 
    public function __construct()
    {
        $this->groupsModel = new GroupsModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $groups = $this->groupsModel->findAll();
        $data = [
            'groups' => $groups,
            'validation' => \Config\Services::validation(),
        ];
        $data['groups'] = $this->groupsModel->findAll();
        return view('groups/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('groups/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        // Cara 1 jika reqeust yang dikirim namanya sama dengan field di database :
        $data = $this->request->getPost();
        // return dd($data);
        $this->groupsModel->insert($data);
        if ($this->groupsModel->affectedRows() > 0) {
            return redirect()->to(site_url('groups'))->with('Success', 'Data Berhasil ditambahkan');
        } else {
            return redirect()->to(site_url('groups'))->with('Error', 'Data Gagal ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $groups = $this->groupsModel->where('id_groups', $id)->first();
        if (is_object($groups)) {
            $data['groups'] = $groups;
            return view('groups/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->groupsModel->update($id, $data);
        return redirect()->to(site_url('groups'))->with('Success', 'Data Berhasil Diubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->groupsModel->delete($id);
        return redirect()->to(site_url('groups'))->with('Success', 'Data berhasil dihapus');
    }
    public function trash()
    {
        $data['groups'] = $this->groupsModel->onlyDeleted()->findAll();
        return view('groups/trash', $data);
    }
    public function restore($id = null)
    {
        $this->groupsModel = \Config\Database::connect();
        if ($id != null) {
            $this->groupsModel->table('groups')
                ->set('deleted_at', null, true)
                ->where(['id_groups' => $id])
                ->update();
        } else {
            $this->groupsModel->table('groups')
                ->set('deleted_at', null, true)
                ->where('deleted_at is  NOT NULL', null, false)
                ->update();
        }
        if ($this->groupsModel->affectedRows() > 0) {
            return redirect()->to(site_url('groups'))->with('Success', 'Data berhasil dipulihkan');
        }
    }
    public function delete_perm($id = null)
    {
        if ($id != null) {
            $this->groupsModel->delete($id, true);
            return redirect()->to(site_url('groups/trash'))->with('Success', 'Data Trash berhasil dihapus permanent');
        } else {
            $this->groupsModel->purgeDeleted();
            return redirect()->to(site_url('groups/trash'))->with('Success', 'Data Trash berhasil dihapus permanent');
        }
    }
}
