<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
        $this->load->model('JenisAset_model');
        $this->load->model('Bidang_model');
        $this->load->model('Resiko_model');
    }

    public function index()
    {
        $data['judul'] = "Data Aset";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aset'] = $this->Aset_model->get();
        $data['jenisaset'] = $this->JenisAset_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['userdata'] = $this->User_model->get();
        $data['risiko'] = $this->Resiko_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_daftar_risiko', $data);
        $this->load->view('layout/footer', $data);
    }
}
