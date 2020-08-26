<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    public function get($select, $table)
    {
        return $this->db->select($select)
                        ->from($table)
                        ->get();
    }

    public function get_where($select, $table, $where, $order = false)
    {
        return $this->db->select($select)
                        ->from($table)
                        ->where($where)
                        ->order_by($order)
                        ->get();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    /**
     * $table   = Nama Table
     * $kolom   = Nama Kolom
     * $where   = Where
     */
    public function delete_batch($table, $kolom, $where)
    {
        $this->db->where_in($kolom, $where);
        return $this->db->delete($table);
    }
}