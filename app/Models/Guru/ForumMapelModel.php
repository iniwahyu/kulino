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
}