<?php 

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function getUsers($where)
    {
        return $this->db->table('users')
                        ->where($where)
                        ->get();
    }

    public function updateLastLogin($data, $where)
    {
        return $this->db->table('users')->update(['last_login' => $data], ['id' => $where]);
    }
}