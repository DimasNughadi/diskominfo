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

    function selectTahunPK()
    {
        $this->db->select('tahun');
        $this->db->from('risiko');
        $this->db->group_by('tahun');

        return $this->db->get();
    }


    function showDR($where)
    {


        $this->db->select('*');
        $this->db->select('(select count(nama_aset) from aset LEFT JOIN risiko ON risiko.id_aset = aset.id_aset where aset.id_aset = risiko.id_aset ) as rowas');
        // $this->db->select('(select count(nama_risiko) from risiko where risiko.id_aset = aset.id_aset and risiko.tahun = '.$where.') as rowpk');
        $this->db->select('(select count(nama_risiko) from risiko where risiko.id_aset = aset.id_aset and risiko.tahun = '.$where.') as rowpk');

        $this->db->from('risiko');
        $this->db->join('aset', 'aset.id_aset = risiko.id_aset', 'left');
        // $this->db->having('rowrs > 0');
        // $this->db->where('risiko.tahun',''.$where.'');
        $this->db->where('risiko.tahun',''.$where.'');
        return $this->db->get();
    }
}
