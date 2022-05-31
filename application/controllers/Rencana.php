<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencana extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Rencana_model');
        $this->load->model('Aset_model');
        $this->load->model('Resiko_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Rencana Penanganan";
        $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['userdata'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('resiko/resiko', $data);
        $this->load->view('layout/footer', $data);
    }
}
