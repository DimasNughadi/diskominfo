<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakAkses_model extends CI_Model
{
    public $table = 'hak_akses';
    public $id = 'hak_akses.id_hak_akses';
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

    public function getPerUser($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}