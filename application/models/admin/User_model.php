<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function getUserWithLevel()
    {
        return $this->db->select('u.id, u.username, l.nama AS level')
                        ->from('users AS u')
                        ->join('master_level AS l', 'l.id = u.level')
                        ->get();
    }
}