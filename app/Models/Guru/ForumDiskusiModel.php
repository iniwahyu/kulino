<?php 

namespace App\Models\Guru;

use CodeIgniter\Model;

class ForumDiskusiModel extends Model
{
    protected $table    = 'forum_diskusi';
    protected $tableAlias   = 'forum_diskusi AS fd';
    protected $allowedFields = [
        'id_forum_mapel', 'id_user', 'parent', 'comment', 'berkas'
    ];
    protected $useTimestamps = true;
    
    public function get($idForumMapel, $parent)
    {
        return $this->orderBy('created_at', 'DESC')->where([
            'id_forum_mapel'        => $idForumMapel,
            'parent'                => $parent,
        ])->findAll();
    }
}