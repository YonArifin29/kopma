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

    public function save()
    {
        // dd($_FILES);
        $rand_num = rand(10000, 99999);
        $nama_foto = $_FILES['foto']['name'];
        $file = $_FILES['foto']['tmp_name'];
        $size = $_FILES['foto']['size'];
        $extension = explode("/", $_FILES['foto']['type'])[1];
        dd($extension);


        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($rand_num, PASSWORD_DEFAULT),
            'nama_usaha' => $this->request->getVar('nama_usaha'),
            'email' => $this->request->getVar('email'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' =>  $nama_foto,
        ];
        $this->userModel->save($data);
        return view('Users/dataUsers', $data);
    }
}
