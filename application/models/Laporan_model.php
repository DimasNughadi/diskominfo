<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public $table = 'risiko';
    public $id = 'risiko.id_risiko';
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
}
