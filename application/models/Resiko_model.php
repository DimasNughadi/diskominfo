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



    // public function update_status_model($id, $status)
    // {
    //     //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.

    //     if ($status == 'Active') {
    //         $sval = 'Inactive';
    //     } else {
    //         $sval = 'Active';
    //     }

    //     // update status value in database 
    //     $data = array('status' => $sval);

    //     $this->db->where('id_user', $id);

    //     return $this->db->update('user', $data);
    // }

    // public function tklien()
    // {
    //     $this->db->from($this->table);
    //     $query = $this->db->where('role', 'User');
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // public function tdesainer()
    // {
    //     $this->db->from($this->table);
    //     $query = $this->db->where('role', 'Desainer');
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

}
