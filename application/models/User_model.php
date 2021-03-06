<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id_user';
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
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getMaxUID()
    {
        $this->db->select_max('id_user');
        $query = $this->db->get('user')->row_array();
        return $query['id_user'];
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
     
    public function update_status_model($id, $status)
    {
        //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.
        if ($status == 'Active') {
            $sval = 'Inactive';
        } else {
            $sval = 'Active';
        }
        // update status value in database 
        $data = array('status' => $sval);
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

}
