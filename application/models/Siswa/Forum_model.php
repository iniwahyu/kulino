<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function getForum($idUser)
    {
        return $this->db->select('fa.`id`, mm.`nama` AS mapel, mm.`kelas`, f.deskripsi, p.`nama` AS guru, f.`kode`')
                        ->from('forum_anggota AS fa')
                        ->join('forum AS f', 'f.id = fa.id_forum')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('pengguna AS p', 'p.id_user = f.id_guru')
                        ->where([
                            'fa.id_user'        => $idUser,
                        ])
                        ->get();
    }
}