<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\SaleModel;

class Home extends BaseController
{
    protected $session;
    protected $userModel;
    protected $productModel;
    protected $saleModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->saleModel = new SaleModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        } else {
            $waktu = date("Y-m-d");
            $data = [
                'title' => 'Beranda',
                'title2' => 'Halaman Beranda',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHome' => 'active',
                'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
                'getDataUserByOnlineStatus' => $this->userModel->getDataUsersByOnStatus(),
                'getPendapatanAdmin' => $this->saleModel->getPendapatanAdmin($waktu),
                'getPenjualanHariIni' => $this->saleModel->getPenjualanHariIni($waktu, $this->session->get('id')),
                'getPendapatanPenjual' => $this->saleModel->getPendapatanPenjual($waktu, $this->session->get('id')),
                'getPendapatanPenjualBulanan' => $this->saleModel->getPendapatanPenjualOneMonth($this->session->get('id')),
                'getTotalSaleProduct' => $this->saleModel->getTotalSaleProduct($this->session->get('id')),
                'road' => [
                    "<li class='breadcrumb-item'><a class='text-dark' href='" . base_url('home') . "'>Home</a></li>",
                ]
            ];
            return view('home/index', $data);
        }
    }

    public function homePage()
    {
        $data = [
            'title' => 'Home Page',
            'dataSomeProduct' => $this->productModel->dataSomeProduct(),
            'dataProductBestSeller' => $this->productModel->dataProductBestSeller(),
        ];
        return view('home/homePage', $data);
    }
    public function menuPage()
    {
        $data = [
            'title' => 'Menu',
            'dataProducts' => $this->productModel->getDataProduct(),
        ];
        return view('home/menuPage', $data);
    }

    public function buyProduct()
    {
        $kode = date("YmdHis");
        $waktu = date("Y-m-d H:i:s");

        $jml_produk = ($this->request->getVar('jumlah') < 0 || $this->request->getVar('jumlah') == "") ? 1 : $this->request->getVar('jumlah');
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_produk' => $this->request->getVar('id_produk'),
            'kode' => $kode,
            'waktu' =>  $waktu,
            'nama_pembeli' => $this->request->getVar('nama_pembeli'),
            'prodi' => $this->request->getVar('prodi'),
            'jml_produk' => $jml_produk,
            'tipe_pemesanan' => $this->request->getVar('pemesanan'),
            'alamat_pengiriman' => $this->request->getVar('ruangan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        if ($this->saleModel->saveData($data)) {
            session()->setFlashdata('message', 'berhasil-disimpan');
            return redirect()->to('Home');
        }
    }
}
