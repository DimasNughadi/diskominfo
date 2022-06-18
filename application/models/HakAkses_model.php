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

    public function update_hak_model_tambah($id_hak_akses, $tambah)
    {
        //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.
        if ($tambah == 1) {
            $sval = 0;
        } else {
            $sval = 1;
        }
        // update status value in database 
        $data = array('tambah' => $sval);
        $this->db->where('id_hak_akses', $id_hak_akses);
        return $this->db->update('hak_akses', $data);
    }

    public function update_hak_model_edit($id_hak_akses, $edit)
    {
        //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.
        if ($edit == 1) {
            $sval = 0;
        } else {
            $sval = 1;
        }
        // update status value in database 
        $data = array('edit' => $sval);
        $this->db->where('id_hak_akses', $id_hak_akses);
        return $this->db->update('hak_akses', $data);
    }

    public function update_hak_model_Hapus($id_hak_akses, $hapus)
    {
        //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.
        if ($hapus == 1) {
            $sval = 0;
        } else {
            $sval = 1;
        }
        // update status value in database 
        $data = array('hapus' => $sval);
        $this->db->where('id_hak_akses', $id_hak_akses);
        return $this->db->update('hak_akses', $data);
    }
}