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
        // dd($this->productModel->dataProductBestSeller());
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
}
