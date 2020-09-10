<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {
    
    public function getForumAll()
    {
        return $this->db->select('f.id, mm.nama AS mapel, p.nama AS guru, f.kode')
                        ->from('forum AS f')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->get();
    }

    public function getForumAllWhere($idForum)
    {
        return $this->db->select('f.id, mm.nama AS mapel, f.deskripsi, p.nama AS pengajar, f.kode')
                        ->from('forum AS f')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->where('f.id', $idForum)
                        ->get();
    }

    public function getSiswaByForum($idForum)
    {
        return $this->db->select('fa.id, p.nama')
                        ->from('forum_anggota AS fa')
                        ->join('pengguna AS p', 'p.id_user = fa.id_user')
                        ->where('fa.id_forum', $idForum)
                        ->get();
    }
}