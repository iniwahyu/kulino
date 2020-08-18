<?php 

namespace App\Models\Guru;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table    = 'forum';
    protected $tableAlias   = 'forum AS f';
    protected $allowedFields = [
        'id_mapel', 'deskripsi', 'id_guru', 'kode'
    ];
    protected $useTimestamps = true;

    public function getForum($where = false)
    {
        if($where == false)
        {
            return $this->db->table($this->table)
                    ->select('forum.id, mm.nama, forum.deskripsi, mm.kelas, forum.kode')
                    ->join('master_mapel AS mm', 'mm.id = forum.id_mapel')
                    ->join('users AS u', 'u.id = forum.id_guru')
                    ->get();
        }
        else
        {
            return $this->where([
                'id'        => $where,
            ])->first();
        }
    }

    public function forumDetail($idUser)
    {
        return $this->db->table($this->tableAlias)
                ->select('f.`id`, mm.`nama`, mm.`kelas`, f.`deskripsi`, g.`nama` AS guru')
                ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                ->join('guru AS g', 'g.id_user = f.id_guru')
                ->where('id_user', $idUser)
                ->get();
    }
}