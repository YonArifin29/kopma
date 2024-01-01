<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SaleModel;

class Sale extends BaseController
{
    protected $productModel;
    protected $userModel;
    protected $session;
    protected $validation;
    protected $saleModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->saleModel = new SaleModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $date = date("Y-m-d");
        $data = [
            'title' => 'Kelola Penjualan',
            'title2' => 'Daftar Penjualan',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalSale' => 'active',
            'dataSales' => $this->saleModel->getDataSaleByDate($date, $this->session->get('id')),
            // 'dataSales' => $this->saleModel->getDataSaleByUser($this->session->get('id')),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))
        ];
        return view('sale/dataSale', $data);
    }

    public function addSale()
    {
        $data = [
            'title' => 'Tambah Penjualan',
            'title2' => 'Tambah Penjualan',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalSale' => 'active',
            'validation' => $this->validation,
            'getNewDataSale' => "",
            'page' => "",
            'dataProducts' => "",
            'actionForm' => 'newTransaction',
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
            'getDataPenjualanByKode' => "",

        ];
        return view('sale/addSale', $data);
    }


    public function newTransaction()
    {

        $kode = date("YmdHis");
        $waktu = date("Y-m-d H:i:s");
        $data1 = [
            'id_pengguna' => $this->session->get('id'),
            'kode' =>  $kode,
            'waktu' =>  $waktu,
        ];

        if ($this->saleModel->saveData($data1)) {
            $data = [
                'kode'  => $kode,
            ];
            $this->session->set($data);
            return redirect()->to('sale/transaction');
        }
    }

    public function transaction()
    {
        $data = [
            'title' => 'Tambah Penjualan',
            'title2' => 'Tambah Penjualan',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeHalSale' => 'active',
            'validation' => $this->validation,
            'dataProducts' => $this->productModel->getDataProductByUser($this->session->get('id')),
            'getNewDataSale' => $this->saleModel->getNewDataSaleByKode($this->session->get('kode')),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
            'page' => 'newTransaction',
            'button' => ['Tabmbah', 'Selesai', 'Batal'],
            'actionForm' => 'save',
            'getDataPenjualanByKode' => $this->saleModel->getDataSaleByKode($this->session->get('kode'))
        ];
        return view('sale/addSale', $data);
    }

    public function save()
    {
        $product =  $this->productModel->getDataProductByKode_product($this->request->getVar('kode_produk'));
        $jml_produk = ($this->request->getVar('jml_produk') < 0 || $this->request->getVar('jml_produk') == "") ? 1 : $this->request->getVar('jml_produk');
        $data1 = [
            'id_pengguna' => $this->session->get('id'),
            'id_produk' => $product[0]['id_produk'],
            'kode' => $this->request->getVar('kode'),
            'waktu' =>  $this->request->getVar('waktu'),
            'jml_produk' => $jml_produk,
        ];;

        if ($this->saleModel->saveData($data1)) {
            return redirect()->to('sale/transaction');
        }
    }

    public function editSale()
    {
        $kode = $this->request->getUri()->getSegment(3);
        $data = [
            'title' => 'Edit Penjualan',
            'title2' => 'Edit Penjualan',
            'jenisLogin' => $this->session->get('jenisLog'),
            'dataProducts' => $this->productModel->getDataProductByUser($this->session->get('id')),
            'activeHalSale' => 'active',
            'validation' => $this->validation,
            'page' => "",
            'actionForm' => 'newTransaction',
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
            'getDataPenjualanByKode' => "",
            'getDataTimeAndCode' => $this->saleModel->getNewDataSaleByKode($kode),
            'getDataSale' => $this->saleModel->getDataSaleByKode($kode),

        ];
        return view('sale/editSale', $data);
    }

    public function edit()
    {
        $product =  $this->productModel->getDataProductByKode_product($this->request->getVar('kode_produk'));
        $jml_produk = ($this->request->getVar('jml_produk') < 0 || $this->request->getVar('jml_produk') == "") ? 1 : $this->request->getVar('jml_produk');
        $kode = $this->request->getVar('kode');
        $data1 = [
            'id_pengguna' => $this->session->get('id'),
            'id_produk' => $product[0]['id_produk'],
            'kode' => $kode,
            'waktu' =>  $this->request->getVar('waktu'),
            'jml_produk' => $jml_produk,
        ];;

        if ($this->saleModel->saveData($data1)) {
            return redirect()->to('sale/editSale/' . $kode);
        }
    }

    public function delete()
    {

        $id = $this->request->getUri()->getSegment(3);
        if (strlen($id) == 14) {
            if ($this->saleModel->deleteDataByKode($id)) {
                return redirect()->to('sale');
            }
        } else {
            $from = explode("-", $id)[0];
            $id_penjualan = explode("-", $id)[1];
            $kode = explode("-", $id)[2];
            if ($from == "e") {
                if ($this->saleModel->deleteData($id_penjualan)) {
                    return redirect()->to('sale/editSale/' . $kode);
                }
            } else {
                if ($this->saleModel->deleteData($id_penjualan)) {
                    return redirect()->to('sale/transaction');
                }
            }
        }
    }

    public function cetakStruk()
    {
        // dd($this->request->getVar('tunai'));
        $kode = $this->request->getUri()->getSegment(3);
        $data = [
            'dataSales' => $this->saleModel->getDataSaleByKode($kode),
            'getDataTimeAndCode' => $this->saleModel->getNewDataSaleByKode($kode),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))

        ];
        return view('sale/struk', $data);
    }

    public function cetak()
    {

        $kode = $this->request->getVar('kode');
        $data = [
            'dataSales' => $this->saleModel->getDataSaleByKode($kode),
            'getDataTimeAndCode' => $this->saleModel->getNewDataSaleByKode($kode),
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
            'tunai' =>  $this->request->getVar('tunai')

        ];
        return view('sale/CetakStruk', $data);
    }
}
