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
            return $this->findAll();
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