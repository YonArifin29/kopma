<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{

    protected $userModel;
    protected $session;
    protected $validation;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Pengguna',
            'title2' => 'Daftar Pengguna',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalUsers' => 'active',
            'dataUsers' => $this->userModel->getDataUsers()
        ];
        return view('Users/dataUsers', $data);
    }

    public function addUser()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'title2' => 'Tambah Pengguna',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalUsers' => 'active',

        ];
        return view('Users/addUsers', $data);
    }

    public function save()
    {
        $rand_num = rand(10000, 99999);
        // $nama_foto = $_FILES['foto']['name'];
        // $file = $_FILES['foto']['tmp_name'];
        // $size = $_FILES['foto']['size'];
        // $extension = explode("/", $_FILES['foto']['type'])[1];

        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'nomor_hp' => 'required',
            'nama_usaha' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email'    => 'required|max_length[254]|valid_email',
        ];

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($rand_num, PASSWORD_DEFAULT),
            'nama_usaha' => $this->request->getVar('nama_usaha'),
            'email' => $this->request->getVar('email'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->validation->setRules($rules);

        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            $this->userModel->save($validatedData);
        } else {
            $data1 = [
                'title' => 'Tambah Pengguna',
                'title2' => 'Tambah Pengguna',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHalUsers' => 'active',
                'errors' => $this->validation->getErrors()

            ];
            dd($this->validation->getErrors());
            return view('Users/addUsers', $data1);
            // return redirect('Users/addUsers')->back()->withInput();
        }
        return view('Users/dataUsers', $data);
    }

    public function delete()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        $result = $this->userModel->deleteData($idUser);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to('Users');
    }
}
