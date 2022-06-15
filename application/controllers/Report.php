<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_daftar_risiko', $data);
        $this->load->view('layout/footer', $data);

    }
}
