<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{

    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_penjualan', 'id_produk', 'id_pengguna', 'kode', 'waktu', 'nama_pembeli', 'prodi', 'jml_produk', 'tipe_pemesanan', 'alamat_pengiriman'];
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getDataSale($id_pengguna = false)
    {
        if ($id_pengguna === false) {
            return $this->builder->orderBy('id_penjualan', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('id_pengguna', $id_pengguna)->get()->getResultArray();
    }

    public function getDataSaleByUser($id_user)
    {
        return $this->builder->where('id_pengguna', $id_user)->get()->getResultArray();
    }

    public function getDataSaleByDate($date, $id_user)
    {

        return $this->db->query("SELECT id_penjualan, kode, waktu, sum(total) as Total FROM penjualan_list WHERE DATE(waktu) = '$date' && id_pengguna = '$id_user' GROUP BY kode")->getResultArray();
    }

    public function getDataSales($date)
    {
        return $this->db->query("SELECT nama, kode, waktu, sum(total) as Total FROM penjualan_list WHERE DATE(waktu) = '$date' GROUP BY kode")->getResultArray();
    }

    public function getPenjualanHariIni($date, $id)
    {
        return $this->db->query("SELECT sum(total) as Total FROM penjualan_list WHERE DATE(waktu) = '$date' && id_pengguna = '$id '")->getResultArray();
    }

    public function getSaleStatistic($id)
    {
        // nanti rubah menjadi DESC
        return $this->db->query("SELECT SUM(total) AS Total FROM penjualan_list WHERE id_pengguna = '$id'GROUP BY DATE(waktu) ORDER BY DATE(waktu) ASC limit 7")->getResultArray();
    }

    public function getTotalSaleProduct($id)
    {
        return $this->db->query("SELECT sum(jumlah) as Total FROM struk_jual WHERE id_pengguna = '$id '")->getResultArray();
    }

    public function getNewDataSaleByKode($kode_transaksi)
    {
        return $this->builder->where('kode', $kode_transaksi)->get()->getResultArray();
    }

    public function getDataSaleByKode($kode_transaksi)
    {
        return $this->db->query("SELECT id_penjualan, kode_penjualan, id_produk, kode_produk, harga, nama_produk, SUM(jumlah) AS Qty, SUM(jumlah * harga) AS Total FROM struk_jual WHERE kode_penjualan = '$kode_transaksi' GROUP BY id_produk;
        ")->getResultArray();
        // return $this->db->query("SELECT * FROM struk_jual WHERE kode_penjualan = '$kode_transaksi'")->getResultArray();
    }

    public function getPendapatanAdmin($waktu)
    {
        return $this->db->query("SELECT SUM(pendapatan_admin) AS pendapatan FROM struk_jual WHERE Date(waktu) = '$waktu';
        ")->getResultArray();
    }

    public function getPendapatanPenjual($waktu, $id)
    {
        return $this->db->query("SELECT SUM(pendapatan_penjual) AS pendapatan FROM struk_jual WHERE Date(waktu) = '$waktu' && id_pengguna = '$id';
        ")->getResultArray();
    }

    public function getPendapatanPenjualOneMonth($id)
    {
        return $this->db->query("SELECT SUM(pendapatan_penjual) as Total FROM struk_jual WHERE id_pengguna = '$id' GROUP BY DATE(waktu) ORDER BY DATE(waktu) DESC LIMIT 30
        ")->getResultArray();
    }

    // public function getDataProductById($id_product = false)
    // {
    //     if ($id_product === false) {
    //         return $this->builder->orderBy('id_produk', 'DESC')->get()->getResultArray();
    //     }
    //     return $this->builder->where('id_produk', $id_product)->get()->getResultArray();
    // }
    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    // public function editData($data, $id)
    // {
    //     return $this->builder->where('id_produk', $id)->update($data);
    // }
    // public function getDataProductById($id)
    // {
    //     return $this->builder->where('id_produk', $id)->get()->getResultArray();
    // }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_penjualan' => $id]);
    }

    public function deleteDataByKode($id)
    {
        return $this->builder->delete(['kode' => $id]);
    }
}
