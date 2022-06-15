<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi_model extends CI_Model
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

    public function getOpen()
    {
        $this->db->select('*');
        $this->db->from('monitor_rtp');
        $this->db->where('status = "Open"');
        return $this->db->count_all_results();
    }

    public function getClose()
    {
        $this->db->select('*');
        $this->db->from('monitor_rtp');
        $this->db->where('status = "Close"');
        return $this->db->count_all_results();
    }

    function showRealisasi()
    {
        $this->db->select('*');
        $this->db->select('(select count(id_risiko) from monitor_rtp where monitor_rtp.id_risiko = risiko.id_risiko) as rowpk');
        $this->db->having('monitor_rtp.id_risiko > 0');
        $this->db->from('monitor_rtp');
        $this->db->join('risiko', 'risiko.id_risiko = monitor_rtp.id_risiko', 'left');
        $this->db->order_by('monitor_rtp.real_mulai ASC');
        return $this->db->get();
        // if($query->num_rows() != 0)
        // {
        //     return $query->result_array();
        // }else{
        //     return false;
        // }
    }

    function showRealisasiJoinRisiko()
    {
        $this->db->select('risiko.nama_risiko, risiko.penyebab, risiko.skala_dampak, risiko.skala_kemungkinan, risiko.tingkat_risiko, monitor_rtp.deskripsi, monitor_rtp.plan_mulai, monitor_rtp.plan_selesai, monitor_rtp.pic, monitor_rtp.status');
        $this->db->select('(select count(id_risiko) from monitor_rtp where monitor_rtp.id_risiko = risiko.id_risiko) as rowpk');
        $this->db->having('monitor_rtp.id_risiko > 0');
        $this->db->from('monitor_rtp');
        $this->db->join('risiko', 'risiko.id_risiko = monitor_rtp.id_risiko', 'left');
        $this->db->order_by('monitor_rtp.real_mulai ASC');
        return $this->db->get();
        // if($query->num_rows() != 0)
        // {
        //     return $query->result_array();
        // }else{
        //     return false;
        // }
    }

    function showRealisasiById($id)
    {

        $this->db->select('*');

        $this->db->from('monitor_rtp');
        $this->db->join('risiko', 'risiko.id_risiko = monitor_rtp.id_risiko', 'right');
        $this->db->where('risiko.id_risiko', $id);
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
    function upload()
    {
        $nama_file = 'file__' . $this->session->userdata('username');
        $config['upload_path']   = './uploadzip/';
        $config['allowed_types'] = 'jpg|png|jpeg|zip|rar';
        $config['max_size']      = '3048';
        $config['remove_space']  = TRUE;
        $config['file_name'] = $nama_file;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('zip_file')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    function saveupload($upload)
    {
        $data = array(
            'berkas' => $upload['berkas']['file_name']
        );
        $where = array(
            'id_risiko' => $this->input->post('id_risiko')
        );
        $this->db->where($where);
        return $this->db->update('monitor_rtp', $data);
    }
}
