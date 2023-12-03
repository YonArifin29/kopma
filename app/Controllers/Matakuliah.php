<?php
namespace App\Controllers;
use App\Models\Matakuliah_model;
class Matakuliah extends BaseController {
    protected $matakuliah_model;
    protected $db;
    public function __construct()
    {
        $this->matakuliah_model = new Matakuliah_model();
    }

    public function index() {
        $data = [
            'title' => 'Data Matakuliah',
            'matakuliah' => $this->matakuliah_model->find_all()
        ];
        return view('matakuliah/tampil_data', $data);
    }

    public function add() {
        if(isset($_POST['tombol'])) {
            $data = array(
                'kode_matakuliah' => $_POST['kode_matakuliah'],
                'nama_matakuliah'  =>  $_POST['nama_matakuliah'],
                'sks'  =>  $_POST['sks'],
                'ruangan'  =>  $_POST['ruangan']
            );
            $result = $this->matakuliah_model->add_data($data);
            if($result > 0) {
                session()->setFlashdata('message', 'ditambahkan');
                return redirect()->to('Matakuliah');
            } else {
                echo "gagal menambahkan data";
            }
        }
        $data = [
            'title' => 'Tambah Data matakuliah'
        ];
        return view('matakuliah/add_data', $data);
    }

    public function update() {
        if(isset($_POST['tombol'])) {
            $data = array(
                'kode_matakuliah' => $_POST['kode_matakuliah'],
                'nama_matakuliah'  =>  $_POST['nama_matakuliah'],
                'sks'  =>  $_POST['sks'],
                'ruangan'  =>  $_POST['ruangan']
            );
            
            $result = $this->matakuliah_model->edit_data($_POST['id_matakuliah'], $data);
            if($result > 0) {
                session()->setFlashdata('message', 'diubah');
                return redirect()->to('Matakuliah');
            } else {
                echo "gagal mengupdate data";
            }
        }

        $data = [
            'title' => 'Edit Data Matakuliah',
            'matakuliah' => $this->matakuliah_model->find_data($_GET['id'])
        ];

        return view('matakuliah/edit_data', $data);
    }

    public function delete() {
        if(isset($_GET['id'])) {
            $result = $this->matakuliah_model->delete_data($_GET['id']);
            if($result > 0) {
                session()->setFlashdata('message', 'dihapus');
                return redirect()->to('Matakuliah');
            } else {
                echo "gagal menghapus data";
            }
        }
    }
}