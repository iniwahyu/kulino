<?php 

namespace App\Models\Guru;

use CodeIgniter\Model;

class ForumMapelModel extends Model
{
    protected $table    = 'forum_mapel';
    protected $tableAlias   = 'forum_mapel AS fm';
    protected $allowedFields = [
        'id_forum', 'pertemuan', 'judul', 'deskripsi', 'berkas'
    ];
    protected $useTimestamps = true;
    
    public function getForumMapel($where)
    {
        return $this->where('id_forum', $where)->orderBy('pertemuan', 'asc')->findAll();
    }

    public function checkForumMapel($id)
    {
        return $this->find($id);
    }

    public function detail($where)
    {
        return $this->db->table($this->tableAlias)
                        ->select('fm.`id`, f.`id_mapel`, mm.`nama` AS mapel, mm.`kelas`, fm.`judul`, fm.deskripsi, f.`id_guru`, g.`nama` AS guru')
                        ->join('forum AS f', 'f.id = fm.id_forum')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('guru AS g', 'g.id_user = f.id_guru')
                        ->where('fm.id', $where)
                        ->get();
    }
}