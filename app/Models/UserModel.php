<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    //read
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['id_pengguna', 'username', 'nama', 'alamat', 'level', 'foto', 'status'];
    protected $builder;
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }
    public function getDataUser($username)
    {   
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