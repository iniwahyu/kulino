<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function getForum($idForum)
    {
        return $this->db->select('f.`id`, mm.`nama` AS mapel, f.`deskripsi`, mm.`kelas`, p.`nama` AS guru')
                        ->from('forum AS f')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->where([
                            'f.id'  => $idForum,
                        ])
                        ->get();
    }

    public function getForumMapelDetail($idForumMapel)
    {
        return $this->db->select('fm.`id`, mm.`nama` AS mapel, mm.`kelas`, fm.`judul`, p.`nama` AS guru, fm.`deskripsi`, fm.`berkas`')
                        ->from('forum_mapel AS fm')
                        ->join('forum AS f', 'f.id = fm.id_forum')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->where('fm.id', $idForumMapel)
                        ->get();
    }

    public function showComment($idForumMapel)
    {
        return $this->db->select('fd.`id`, fd.id_user, p.`nama` AS pengguna, fd.`comment`, fd.`berkas`, l.`nama` AS level, fd.`created_at`')
                        ->from('forum_diskusi AS fd')
                        ->join('forum_mapel AS fm', 'fm.id = fd.id_forum_mapel')
                        ->join('forum AS f', 'f.id = fm.id_forum')
                        ->join('pengguna AS p', 'p.id_user = fd.id_user')
                        ->join('users AS u', 'u.id = fd.id_user')
                        ->join('master_level AS l', 'l.id = u.level')
                        ->where([
                            'fd.id_forum_mapel' => $idForumMapel,
                        ])
                        ->order_by('fd.id', 'DESC')
                        ->get();
    }

    public function getDetailBalasComment($idForumDiskusi)
    {
        return $this->db->select('fd.`id`, fd.`parent`, fd.`comment`, fd.`berkas`, p.`nama` AS pengguna')
                        ->from('forum_diskusi AS fd')
                        ->join('pengguna AS p', 'p.id_user = fd.id_user')
                        ->where('fd.id', $idForumDiskusi)
                        ->get();
    }
}