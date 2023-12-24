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
        $password = rand(100000, 999999);
        $username = $this->request->getVar('username');
        $nomor_hp = $this->request->getVar('nomor_hp');
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
            'username' => $username,
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama_usaha' => $this->request->getVar('nama_usaha'),
            'email' => $this->request->getVar('email'),
            'nomor_hp' => $nomor_hp,
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->validation->setRules($rules);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->userModel->saveData($validatedData)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $nomor_hp,
                        'message' => "
                    Ini Username: " . $username . " dan Password " . $password . " kamu untuk login ke website KOPMA!",
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: eoEbr!dL6xtp4P06kuK9'
                    ),
                ));
                $response = curl_exec($curl);
                if (curl_errno($curl)) {
                    session()->setFlashdata('message', 'gagal-disimpan');
                    return redirect()->to('Users');
                    $error_msg = curl_error($curl);
                }
                curl_close($curl);
                session()->setFlashdata('message', 'berhasil-disimpan');
                return redirect()->to('Users');
            }
        } else {
            $dataWithError = [
                'title' => 'Tambah Pengguna',
                'title2' => 'Tambah Pengguna',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHalUsers' => 'active',
                'errors' => $this->validation->getErrors()

            ];
            return view('Users/addUsers', $dataWithError);
        }
    }

    public function editUser()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        $data = [
            'title' => 'Edit Pengguna',
            'title2' => 'Edit Pengguna',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalUsers' => 'active',
            'dataUsers' => $this->userModel->getDataUsersById($idUser)

        ];
        return view('Users/editUsers', $data);
    }

    public function edit()
    {
        //validasi input
        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'nomor_hp' => 'required',
            'nama_usaha' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'level' => 'required',
            'status' => 'required',
            'email'    => 'required|max_length[254]|valid_email',
        ];

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nama_usaha' => $this->request->getVar('nama_usaha'),
            'email' => $this->request->getVar('email'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
            'level' => $this->request->getVar('level'),
            'status' => $this->request->getVar('status'),
        ];

        $this->validation->setRules($rules);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->userModel->editData($validatedData, $this->request->getVar('id_pengguna'))) {
                session()->setFlashdata('message', 'berhasil-diedit');
                return redirect()->to('Users');
            }
        } else {
            $dataWithError = [
                'title' => 'Tambah Pengguna',
                'title2' => 'Tambah Pengguna',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHalUsers' => 'active',
                'errors' => $this->validation->getErrors()

            ];
            return view('Users/addUsers', $dataWithError);
        }
    }

    public function delete()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        if ($this->userModel->deleteData($idUser)) {
            session()->setFlashdata('message', 'berhasil-dihapus');
            return redirect()->to('Users');
        } else {
            session()->setFlashdata('message', 'gagal-dihapus');
            return redirect()->to('Users');
        }
    }
}
