<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencana_model extends CI_Model
{
    public $table = 'monitor_rtp';
    public $id = 'monitor_rtp.id_risiko';
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

    function showRencana()
    {
        $where = "risiko.nama_risiko != ''";

        $this->db->select('*');

        $this->db->from('monitor_rtp');
        $this->db->join('risiko', 'risiko.id_risiko = monitor_rtp.id_risiko', 'right');
        $this->db->where($where);
        return $this->db->get();
    }

    function showRencanaById($id)
    {

        $this->db->select('*');

        $this->db->from('monitor_rtp');
        $this->db->join('risiko', 'risiko.id_risiko = monitor_rtp.id_risiko', 'right');
        // $this->db->join('tbl_skp', 'tbl_skp.id_skp = risiko.id_skp', 'left');
        // $this->db->join('tbl_pk', 'tbl_pk.id_pk = tbl_skp.id_pk', 'left');
        // $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit = tbl_pk.id_unit', 'left');
        $this->db->where('risiko.id_risiko', $id);
        // $this->db->order_by('monitor_rtp.plan_mulai ASC');
        $query = $this->db->get();
        return $query->row_array();
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
