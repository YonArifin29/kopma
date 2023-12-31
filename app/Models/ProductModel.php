<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $useAutoIncrement = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id_produk', 'id_pengguna', 'kode_produk', 'nama_produk', 'harga_jual', 'kategori'];
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getDataProduct($id_product = false)
    {
        if ($id_product === false) {
            return $this->builder->orderBy('id_produk', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('id_produk', $id_product)->get()->getResultArray();
    }

    public function dataSomeProduct()
    {
        return $this->builder->orderBy('id_produk', 'DESC')->limit(4)->get()->getResultArray();
    }

    public function dataProductBestSeller()
    {
        return $this->db->query("SELECT id_penjualan, kode_penjualan, id_produk, gambar, SUM(jumlah) AS total, harga, kode_produk, nama_produk FROM struk_jual GROUP BY id_produk ORDER BY total DESC LIMIT 4")->getResultArray();
    }

    public function getDataProductByUser($id_user)
    {

        return $this->builder->where('id_pengguna', $id_user)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function editData($data, $id)
    {
        return $this->builder->where('id_produk', $id)->update($data);
    }
    public function getDataProductById($id)
    {
        return $this->builder->where('id_produk', $id)->get()->getResultArray();
    }

    public function getDataProductByKode_product($kodeProduct)
    {
        return $this->builder->where('kode_produk', $kodeProduct)->get()->getResultArray();
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_produk' => $id]);
    }
}
