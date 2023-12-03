<?php
namespace App\Models;
use CodeIgniter\Model;

class Mahasiswa_model extends Model {
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function find_all() {
        return $this->db->table("tbl_mahasiswa")->get()->getResult('array');
    }

    public function find_data($id) {
        return $this->db->query("SELECT * FROM tbl_mahasiswa WHERE id='$id'")->getResult('array');
    }

    public function add_data($data) {
        return $this->db->table('tbl_mahasiswa')->insert($data);
    }

    public function edit_data($id, $data) {
        return $this->db->table('tbl_mahasiswa')->where('id', $id)->update($data);
    }

    public function delete_data($id) {
        return $this->db->table('tbl_mahasiswa')->where('id', $id)->delete();
    }
}