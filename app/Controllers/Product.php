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
            'dataProducts' => $this->productModel->getDataProductByUser($this->session->get('id')),
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
                'id_pengguna' => 'required',
                'gambar' => 'required|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,imageJPEG,image/png]',
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
                'gambar' => [
                    'required' => '{field} harus diisi',
                    'is_image' => 'yang diupload harus gambar',
                    'max_size' => 'gambar telalu besar',
                ],
            ]
        ];
        $file = $this->request->getFile('gambar');
        $tempfile = $file->getTempName();
        $newName = $file->getRandomName();
        $data = [
            'id_pengguna' => $this->session->get('id'),
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'kategori' => $this->request->getVar('kategori'),
            'gambar' =>  $newName,
        ];
        $this->validation->setRules($rules[0], $rules[1]);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->productModel->saveData($validatedData)) {
                move_uploaded_file($tempfile, '../public/' . 'img/' . $newName);
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

    public function edit()
    {
        $rules = [
            [
                'kode_produk' => 'required',
                'nama_produk' => 'required',
                'harga_jual' => 'required',
                'kategori' => 'required',
                'gambar' => 'required|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,imageJPEG,image/png]',
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
                'gambar' => [
                    'required' => '{field} harus diisi',
                    'is_image' => 'yang diupload harus gambar',
                ],
            ]
        ];
        $file = $this->request->getFile('gambar');
        $tempfile = $file->getTempName();
        $name_img = $file->getName();
        $newName = $file->getRandomName();
        $id_produk = $this->request->getVar('id_produk');
        if ($name_img == "") {
            $name = $this->request->getVar('old_img');
            $data = [
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga_jual' => $this->request->getVar('harga_jual'),
                'kategori' => $this->request->getVar('kategori'),
                'gambar' => $this->request->getVar('old_img')
            ];
        } else {
            $name = $newName;
            $data = [
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga_jual' => $this->request->getVar('harga_jual'),
                'kategori' => $this->request->getVar('kategori'),
                'gambar' => $newName
            ];
            unlink('../public/img/' . $this->request->getVar('old_img'));
        }

        $this->validation->setRules($rules[0], $rules[1]);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->productModel->editData($validatedData, $id_produk)) {
                move_uploaded_file($tempfile, '../public/' . 'img/' . $name);
                session()->setFlashdata('message', 'berhasil-diedit');
                return redirect()->to('product');
            }
        } else {
            return redirect()->to('product/editProduct/' . $id_produk)->withInput()->with('validation', $this->validation);
        }
    }

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
