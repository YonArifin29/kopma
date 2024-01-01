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
        // $array = array('id_pengguna =' => $id_user, 'waktu =' => $date);
        // return $this->builder->where($array)->get()->getResultArray();

        return $this->db->query("SELECT id_penjualan, kode, waktu, sum(total) as Total FROM penjualan_list WHERE DATE(waktu) = '$date' && id_pengguna = '$id_user' GROUP BY kode")->getResultArray();
    }

    public function getDataSales($date)
    {
        return $this->db->query("SELECT nama, kode, waktu, sum(total) as Total FROM penjualan_list WHERE DATE(waktu) = '$date' GROUP BY kode")->getResultArray();
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
