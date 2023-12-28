<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class Product extends BaseController
{

    protected $productModel;
    protected $userModel;
    protected $session;
    protected $validation;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola produk',
            'title2' => 'Daftar produk',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalproduct' => 'active',
            'dataProducts' => $this->productModel->getDataproduct(),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))
        ];
        return view('product/dataProduct', $data);
    }

    public function addProduct()
    {
        $data = [
            'title' => 'Tambah Produk',
            'title2' => 'Tambah Produk',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalproduct' => 'active',
            'validation' => $this->validation,
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))

        ];
        return view('product/addProduct', $data);
    }

    public function save()
    {


        // $nama_foto = $_FILES['foto']['name'];
        // $file = $_FILES['foto']['tmp_name'];
        // $size = $_FILES['foto']['size'];
        // $extension = explode("/", $_FILES['foto']['type'])[1];

        $rules = [
            [
                'kode_produk' => 'required',
                'nama_produk' => 'required',
                'harga_jual' => 'required',
                'kategori' => 'required',
                // 'gambar' => 'required',
            ],
            [
                'kode_prduk' => [
                    'required' => '{field} harus diisi',
                ],
                'nama_produk' => [
                    'required' => '{field} harus diisi',
                ],
                'harga_jual' => [
                    'required' => '{field} harus diisi',
                ],
                // 'gambar' => [
                //     'required' => 'nomor Hp harus diisi',
                // ],
            ]
        ];

        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'kategori' => $this->request->getVar('kategori'),
        ];
        $this->validation->setRules($rules[0], $rules[1]);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->productModel->saveData($validatedData)) {

                session()->setFlashdata('message', 'berhasil-disimpan');
                return redirect()->to('product');
            }
        } else {
            return redirect()->to('product/addProduct')->withInput()->with('validation', $this->validation);
        }
    }

    public function editProduct()
    {
        $idProduct = $this->request->getUri()->getSegment(3);
        $data = [
            'title' => 'Edit Produk',
            'title2' => 'Edit Produk',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalproduct' => 'active',
            'dataProduct' => $this->productModel->getDataproduct($idProduct),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))

        ];
        return view('product/editProduct', $data);
    }

    // public function edit()
    // {
    //     // dd('cek');
    //     //validasi input
    //     $id_pengguna = $this->request->getVar('id_pengguna');
    //     $rules = [
    //         'username' => 'required',
    //         'nama' => 'required',
    //         'nomor_hp' => 'required',
    //         'nama_usaha' => 'required',
    //         'gender' => 'required',
    //         'alamat' => 'required',
    //         'level' => 'required|regex_match[/1|2/]',
    //         'status' => 'required|regex_match[/1|2/]',
    //         'email'    => 'required|max_length[254]|valid_email',
    //     ];
    //     // dd($this->request->getVar('level'));
    //     $data = [
    //         'username' => $this->request->getVar('username'),
    //         'nama' => $this->request->getVar('nama'),
    //         'nama_usaha' => $this->request->getVar('nama_usaha'),
    //         'email' => $this->request->getVar('email'),
    //         'nomor_hp' => $this->request->getVar('nomor_hp'),
    //         'gender' => $this->request->getVar('gender'),
    //         'alamat' => $this->request->getVar('alamat'),
    //         'level' => $this->request->getVar('level'),
    //         'status' => $this->request->getVar('status'),
    //     ];

    //     $this->validation->setRules($rules);
    //     if ($this->validation->run($data)) {
    //         $validatedData = $this->validation->getValidated();
    //         if ($this->productModel->editData($validatedData, $id_pengguna)) {
    //             session()->setFlashdata('message', 'berhasil-diedit');
    //             return redirect()->to('product');
    //         }
    //     } else {
    //         return redirect()->to('product/editUser/' . $id_pengguna)->withInput()->with('validation', $this->validation);
    //     }
    // }

    public function delete()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        if ($this->productModel->deleteData($idUser)) {
            session()->setFlashdata('message', 'berhasil-dihapus');
            return redirect()->to('product');
        } else {
            session()->setFlashdata('message', 'gagal-dihapus');
            return redirect()->to('product');
        }
    }
}
