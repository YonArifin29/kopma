<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['username', 'nama', 'email', 'nama_usaha', 'foto', 'alamat', 'level', 'foto', 'status'];
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

    public function updatePassUser($password, $username)
    {
        $this->builder->set('password', $password)->where('username', $username)->update();
    }

    public function updateOTP($otp, $username)
    {
        $this->builder->set('otp', $otp)->where('username', $username)->update();
    }
}
