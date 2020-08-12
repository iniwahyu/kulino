<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table    = 'users';
    protected $allowedFields = [
        'username', 'level', 'password', 'sandi'
    ];
    protected $useTimestamps = true;

    public function getUsers($where = false)
    {
        if($where == false)
        {
            return $this->db->table($this->table)
                    ->select('users.id, users.username, master_level.nama AS level, users.last_login')
                    ->join('master_level', 'master_level.id = users.level')
                    ->get();
        }
        else
        {
            return $this->where([
                'id'        => $where,
            ])->first();
        }
    }

    public function insertUsers()
    {

    }
}