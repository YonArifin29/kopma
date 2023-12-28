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

    public function getDataProductByUser($id_user)
    {

        return $this->builder->where('id_pengguna', $id_user)->get()->getResultArray();
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

    public function editData($data, $id)
    {
        return $this->builder->where('id_produk', $id)->update($data);
    }
    public function getDataProductById($id)
    {
        return $this->builder->where('id_produk', $id)->get()->getResultArray();
    }

    // public function updatePassUser($password, $username)
    // {
    //     return $this->builder->set('password', $password)->where('username', $username)->update();
    // }

    // public function updateOTP($otp, $username)
    // {
    //     $this->builder->set('otp', $otp)->where('username', $username)->update();
    // }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_produk' => $id]);
    }

    // public function saveData($data)
    // {
    //     return $this->builder->insert($data);
    // }
}
