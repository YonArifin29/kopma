<?php
namespace App\Controllers;
use App\Models\Mahasiswa_model;
class Mahasiswa extends BaseController {
    protected $mahasiswa_model;
    protected $db;
    public function __construct()
    {
        $this->mahasiswa_model = new Mahasiswa_model();
    }

    public function index() {
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswa_model->find_all()
        ];
        return view('mahasiswa/tampil_data', $data);
    }
   
    public function add() {
        if(isset($_POST['tombol'])) {
            $data = array(
                'nim' => $_POST['nim'],
                'nama'  =>  $_POST['nama'],
                'alamat'  =>  $_POST['alamat'],
                'no_hp'  => $_POST['no_hp']
            );
            $rules = ['nim' => 'required'];
            if (!$this->validate($rules)) {
                $validtion = \Config\Services::validation();
                dd($validtion);
            }
            $result = $this->mahasiswa_model->add_data($data);
            if($result > 0) {
                session()->setFlashdata('message', 'ditambahkan');
                return redirect()->to('Mahasiswa');
            } else {
                echo "gagal menambahkan data";
            }
        }
        $data = [
            'title' => 'Tambah Data Mahasiswa'
        ];
        return view('mahasiswa/add_data', $data);
    }

    public function update() {
        if(isset($_POST['tombol'])) {
            $data = array(
                'nim' => $_POST['nim'],
                'nama'  =>  $_POST['nama'],
                'alamat'  =>  $_POST['alamat'],
                'no_hp'  => $_POST['no_hp']
            );
            
            $result = $this->mahasiswa_model->edit_data($_POST['id'], $data);
            if($result > 0) {
                session()->setFlashdata('message', 'diubah');
                return redirect()->to('Mahasiswa');
            } else {
                echo "gagal mengupdate data";
            }
        }

        $data = [
            'title' => 'Edit Data Mahasiswa',
            'mahasiswa' => $this->mahasiswa_model->find_data($_GET['id'])
        ];

        return view('mahasiswa/edit_data', $data);
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $result = $this->mahasiswa_model->delete_data($_GET['id']);
            if($result > 0) {
                session()->setFlashdata('message', 'dihapus');
                return redirect()->to('Mahasiswa');
            } else {
                echo "gagal menghapus data";
            }
        }
    }
}