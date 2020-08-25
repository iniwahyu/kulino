<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function getForum($idGuru)
    {
        return $this->db->select('f.id, mm.nama, f.deskripsi, mm.kelas, f.kode, p.nama AS guru')
                        ->from('forum AS f')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->where('f.id_guru', $idGuru)
                        ->get();
    }

    public function getForumMapel($idForum, $idGuru)
    {
        return $this->db->select('fm.`id`, fm.`id_forum`, fm.pertemuan, fm.`judul`')
                        ->from('forum_mapel AS fm')
                        ->join('forum AS f', 'f.id = fm.id_forum')
                        ->where([
                            'fm.id_forum'       => $idForum,
                            'f.id_guru'         => $idGuru,
                        ])
                        ->order_by('fm.pertemuan', 'ASC')
                        ->get();
    }

    public function getForumDiskusi($idForumMapel)
    {
        return $this->db->select('fm.`id`, f.`id_mapel`, mm.`nama` AS mapel, mm.`kelas`, fm.`judul`, fm.deskripsi, f.`id_guru`, p.`nama` AS guru')
                        ->from('forum_mapel AS fm')
                        ->join('forum AS f', 'f.id = fm.id_forum')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->where([
                            'fm.id'     => $idForumMapel,
                        ])
                        ->get();
    }

    public function getDetailComment($idForumMapel)
    {
        return $this->db->select('fd.*, p.nama AS pengguna, l.nama AS level')
                        ->from('forum_diskusi AS fd')
                        ->join('pengguna AS p', 'p.id_user = fd.id_user')
                        ->join('users AS u', 'u.id = p.id_user')
                        ->join('master_level AS l', 'l.id = u.level')
                        ->where('fd.id_forum_mapel', $idForumMapel)
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