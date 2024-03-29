<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SaleModel;


class SalesReport extends BaseController
{

    protected $session;
    protected $userModel;
    protected $saleModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->saleModel = new SaleModel();
    }

    public function index()
    {

        $waktu = date("Y-m-d");
        $data = [
            'title' => 'Laporan Penjuan',
            'title2' => 'Halaman Laporan Penjualan',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeLapPenjualan' => 'active',
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
            'dataSales' => $this->saleModel->getDataSales($waktu),
            'dataSales' => $this->saleModel->getDataSales($waktu),
            // 'rupiahHelper' => "",
            'road' => [
                "<li class='breadcrumb-item'><a class='text-dark' href='" .  base_url('salesReport') . "'>Laporan Penjualan</a></li>",
            ]

        ];
        return view('salesReport/index', $data);
    }

    public function getSaleStatistic()
    {
        echo json_encode($this->saleModel->getSaleStatistic($this->session->get('id')));
    }
}
