<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['username', 'nama', 'password', 'email', 'nama_usaha', 'alamat', 'level', 'foto', 'status', 'gender', 'nomor_hp'];
    protected $builder;
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }
    public function getDataUsers($username = false)
    {
        if ($username === false) {
            return $this->builder()->get()->getResultArray();
        }
        return $this->builder->where('username', $username)->get()->getResultArray();
    }

    public function editData($data, $id)
    {
        return $this->builder->where('id_pengguna', $id)->update($data);
    }
    public function getDataUsersById($id)
    {
        return $this->builder->where('id_pengguna', $id)->get()->getResultArray();
    }

    public function updatePassUser($password, $username)
    {
        return $this->builder->set('password', $password)->where('username', $username)->update();
    }

    public function updateOTP($otp, $username)
    {
        $this->builder->set('otp', $otp)->where('username', $username)->update();
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_pengguna' => $id]);
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }
}
