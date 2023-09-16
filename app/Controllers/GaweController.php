<?php

namespace App\Controllers;

use App\Models\GaweModel;

class GaweController extends BaseController
{
    protected $gaweModel;
    public function __construct()
    {
        $this->gaweModel = new GaweModel();
    }
    public function index(): string
    {
        $gawe = $this->gaweModel->get();
        $data = [
            'gawe' => $gawe->getResult(),
            'validation' => \Config\Services::validation(),
        ];
        return view('gawe/get', $data);
    }
    public function create()
    {
        return view('gawe/add');
    }
    public function store()
    {
        $this->gaweModel->save([
            'name' => $this->request->getVar('name'),
            'date' => $this->request->getVar('date'),
            'info' => $this->request->getVar('info'),
        ]);
        if ($this->gaweModel->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('Success', 'Data Berhasil ditambahkan');
        } else {
            return redirect()->to(site_url('gawe'))->with('Error', 'Data Gagal diubah');
        }
    }
    public function edit($id)
    {
        $gawe = $this->gaweModel->getWhere(['id' => $id]);
        if ($gawe->resultID->num_rows > 0) {
            // Jika datanya ada
            $data['gawe'] = $gawe->getRow();
            // ['gawe'] ini yang akan di gunakan pada view
            return view('gawe/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        $this->gaweModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'date' => $this->request->getVar('date'),
            'info' => $this->request->getVar('info'),
        ]);
        session()->setFlashdata('Success', 'Data berhasil diubah');
        return redirect()->to('/gawe');
    }

    public function delete($id)
    {
        $this->gaweModel->delete($id);
        session()->setFlashdata('Success', 'Data berhasil di dihapus');
        return redirect()->to('/gawe');
    }
}
