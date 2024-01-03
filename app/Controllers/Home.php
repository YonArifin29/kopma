<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $session;
    protected $userModel;
    protected $productModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        } else {
            $data = [
                'title' => 'Beranda',
                'title2' => 'Halaman Beranda',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHome' => 'active',
                'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
                'getDataUserByOnlineStatus' => $this->userModel->getDataUsersByOnStatus(),
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
}
