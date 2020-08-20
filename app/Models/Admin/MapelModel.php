<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table    = 'master_mapel';
    protected $allowedFields = [
        'kelas', 'nama'
    ];
    protected $useTimestamps = true;

    public function getMapel($where = false)
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
}