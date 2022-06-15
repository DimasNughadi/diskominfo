<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakAkses_model extends CI_Model
{
    public $table = 'hak_akses';
    public $id = 'hak_akses.id_hak_akses';
    public $id2 = 'hak_akses.id_user';
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_hak_akses', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPerUser($id2)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id2);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data2)
    {
        $this->db->insert($this->table, $data2);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}