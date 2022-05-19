<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->User_model->get();
        $data['judul'] = "Data Akun";
        $this->load->view('layout/header', $data);
        $this->load->view('akun/akun', $data);
        $this->load->view('layout/footer', $data);

    }
}
