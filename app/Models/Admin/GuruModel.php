<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table    = 'guru';
    protected $allowedFields = [
        'id_user', 'nuptk', 'nama', 'email', 'nohp'
    ];
    protected $useTimestamps = true;

    public function getGuru($where = false)
    {
        if($where == false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->find($where);
        }
    }

    public function getIdUser($idUser)
    {
        return $this->where(
            [
                'id_user'       => $idUser,
            ]
        )->first();
    }

    public function checkUsers($idUser)
    {
        return $this->db->table($this->table)->where(['id_user' => $idUser])->get()->resultID->num_rows;
    }
}