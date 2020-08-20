<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table    = 'siswa';
    protected $allowedFields = [
        'id_user', 'nis', 'nama', 'email', 'jenis_kelamin', 'nohp'
    ];
    protected $useTimestamps = true;

    public function getSiswa($where = false)
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

    public function checkUsers($idUser)
    {
        return $this->db->table($this->table)->where(['id_user' => $idUser])->get()->resultID->num_rows;
    }
}