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
    protected $allowedFields = ['id_produk', 'kode_produk', 'nama_produk', 'harga_jual', 'kategori'];
    protected $builder;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }
    public function getDataProduct($name_roduct = false)
    {
        if ($name_roduct === false) {
            return $this->builder()->get()->getResultArray();
        }
        return $this->builder->where('nama_produk', $name_roduct)->get()->getResultArray();
    }

    // public function editData($data, $id)
    // {
    //     return $this->builder->where('id_pengguna', $id)->update($data);
    // }
    // public function getDataUsersById($id)
    // {
    //     return $this->builder->where('id_pengguna', $id)->get()->getResultArray();
    // }

    // public function updatePassUser($password, $username)
    // {
    //     return $this->builder->set('password', $password)->where('username', $username)->update();
    // }

    // public function updateOTP($otp, $username)
    // {
    //     $this->builder->set('otp', $otp)->where('username', $username)->update();
    // }

    // public function deleteData($id)
    // {
    //     return $this->builder->delete(['id_pengguna' => $id]);
    // }

    // public function saveData($data)
    // {
    //     return $this->builder->insert($data);
    // }
}
