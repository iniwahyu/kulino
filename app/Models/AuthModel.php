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
}