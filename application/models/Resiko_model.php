<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resiko_model extends CI_Model
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

    function showRisiko()
    {
        $this->db->select('*');
        $this->db->select('(select count(nama_risiko) from risiko where risiko.id_aset = aset.id_aset) as rowpk');
        $this->db->having('risiko.id_risiko > 0');
        $this->db->from('aset');
        $this->db->join('risiko', 'risiko.id_aset = aset.id_aset', 'left');
        $this->db->join('user', 'user.id_user = aset.id_user', 'left');
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_risiko', $id);
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
