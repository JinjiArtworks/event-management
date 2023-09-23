<?php

namespace App\Controllers;

use App\Models\ContactsModel;
use App\Models\GroupsModel;
use CodeIgniter\RESTful\ResourceController;

class Contacts extends ResourceController
{
    protected $contacts;
    protected $groups;
    public function __construct()
    {
        $this->contacts = new ContactsModel();
        $this->groups = new GroupsModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['contacts'] = $this->contacts->getAll();
        return view('contacts/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['groups'] = $this->groups->findAll();
        return view('contacts/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->contacts->insert($data);
        if ($this->contacts->affectedRows() > 0) {
            return redirect()->to(site_url('contacts'))->with('Success', 'Data Berhasil ditambahkan');
        } else {
            return redirect()->to(site_url('contacts'))->with('Error', 'Data Gagal ditambahkan');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $contacts = $this->contacts->find($id);
        if (is_object($contacts)) {
            $data['contacts'] = $contacts;
            $data['groups'] = $this->groups->findAll();
            return view('contacts/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->contacts->update($id, $data);
        return redirect()->to(site_url('contacts'))->with('Success', 'Data Berhasil Diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->contacts->delete($id);
        return redirect()->to(site_url('contacts'))->with('Success', 'Data berhasil dihapus');
    }
}
