<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{

    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
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
}
