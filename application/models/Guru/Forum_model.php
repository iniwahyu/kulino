<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function getForum($idGuru)
    {
        return $this->db->select('f.id, mm.nama, f.deskripsi, mm.kelas, f.kode')
                        ->from('forum AS f')
                        ->join('master_mapel AS mm', 'mm.id = f.id_mapel')
                        ->join('users AS u', 'u.id = f.id_guru')
                        ->where('f.id_guru', $idGuru)
                        ->get();
    }
}