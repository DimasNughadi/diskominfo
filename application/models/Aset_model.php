<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_model extends CI_Model
{
    public $table = 'aset';
    public $id = 'aset.id_aset';
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

    public function getAsetPhysical()
    {
        $this->db->from($this->table);
        $this->db->where('aset.id_jenis_aset', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAsetSoftware()
    {
        $this->db->from($this->table);
        $this->db->where('aset.id_jenis_aset', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCount()
    {
        return $this->db->query("SELECT SUM(qty) as total
        FROM aset")->row_array();
    }

    public function getCountP()
    {
        return $this->db->query("SELECT SUM(qty) as total
        FROM aset where id_bidang = 1 ")->row_array();
    }

    public function getCountS()
    {
        return $this->db->query("SELECT SUM(qty) as totalS
        FROM aset where id_bidang = 5 ")->row_array();
    }

    public function getCountI()
    {
        return $this->db->query("SELECT SUM(qty) as totalI
        FROM aset where id_bidang = 3 ")->row_array();
    }

    public function getCountA()
    {
        return $this->db->query("SELECT SUM(qty) as totalA
        FROM aset where id_bidang = 2 ")->row_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_aset', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
