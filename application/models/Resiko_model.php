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
        $this->db->select('(select count(nama_aset) from aset LEFT JOIN risiko ON risiko.id_aset = aset.id_aset where aset.id_aset = risiko.id_aset ) as rowas');
        $this->db->select('(select count(nama_risiko) from risiko where risiko.id_aset = aset.id_aset) as rowpk');

        $this->db->from('risiko');
        $this->db->join('aset', 'aset.id_aset = risiko.id_aset', 'left');
        // $this->db->having('rowrs > 0');
        // $this->db->where('risiko.tahun','2019');
        return $this->db->get();
    }

    


    function getCountSR()
    {
        $this->db->select('*');
        $this->db->from('risiko');
        $this->db->where('tingkat_risiko >= 1');
        $this->db->where('tingkat_risiko <= 5');
        $this->db->where('skala_dampak != 5');
        // return $this->db->get();
        return $this->db->count_all_results();
    }

    function getCountR()
    {
        $this->db->select('*');
        $this->db->from('risiko');
        $this->db->where('tingkat_risiko >= 6');
        $this->db->where('tingkat_risiko <= 11');
        $this->db->where('skala_dampak != 5');
        // return $this->db->get();
        return $this->db->count_all_results();
    }

    function getCountS()
    {
        $this->db->select('*');
        $this->db->from('risiko');
        $this->db->where('tingkat_risiko >= 12');
        $this->db->where('tingkat_risiko <= 16');
        $this->db->where('skala_dampak != 5');
        // return $this->db->get();
        return $this->db->count_all_results();
    }

    function getCountT()
    {
        $this->db->select('*');
        $this->db->from('risiko');
        $this->db->where('tingkat_risiko >= 16');
        $this->db->where('tingkat_risiko <= 19');
        $this->db->where('skala_dampak != 5');
        // return $this->db->get();
        return $this->db->count_all_results();
    }

    function getCountST()
    {
        $this->db->select('*');
        $this->db->from('risiko');
        $this->db->where('tingkat_risiko >= 20');
        // return $this->db->get();
        return $this->db->count_all_results();
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
