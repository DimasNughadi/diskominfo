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

    public function getCount()
    {
        $this->db->select('*');
        $this->db->from('aset');
        return $this->db->count_all_results();
        
    }

    public function getPhysical($where2)
    {
        $where = 'Physical';
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->join('jenis_aset', 'jenis_aset.id_jenis_aset = aset.id_jenis_aset', 'right');
        $this->db->join('user', 'user.id_user = aset.id_user', 'left');
        $this->db->where($where2);
        $this->db->where('jenis_aset.nama_jenis_aset', $where);
        return $this->db->get();
    }

    public function getSoftware($where2)
    {
        $where = 'Software';
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->join('jenis_aset', 'jenis_aset.id_jenis_aset = aset.id_jenis_aset', 'right');
        $this->db->join('user', 'user.id_user = aset.id_user', 'left');
        $this->db->where($where2);
        $this->db->where('jenis_aset.nama_jenis_aset', $where);
        return $this->db->get();
    }

    public function getCountPhy(){
        $where = 'Physical';
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->join('jenis_aset', 'jenis_aset.id_jenis_aset = aset.id_jenis_aset', 'right');
        $this->db->join('user', 'user.id_user = aset.id_user', 'left');
        $this->db->where($where2);
        $this->db->where('jenis_aset.nama_jenis_aset', $where);
        // return $this->db->get();
        return $this->db->count_all_results();
    }

    public function getCountSoft(){
        $where = 'Software';
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->join('jenis_aset', 'jenis_aset.id_jenis_aset = aset.id_jenis_aset', 'right');
        $this->db->join('user', 'user.id_user = aset.id_user', 'left');
        $this->db->where($where2);
        $this->db->where('jenis_aset.nama_jenis_aset', $where);
        // return $this->db->get();
        return $this->db->count_all_results();
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
