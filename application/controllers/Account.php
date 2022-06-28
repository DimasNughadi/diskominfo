<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Bidang_model');
        $this->load->model('Menu_model');
        $this->load->model('HakAkses_model');
        
    }

    public function index()
    {
        $data['judul'] = "Account";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bidang'] = $this->Bidang_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $data['menu'] = $this->Menu_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('account/vw_account', $data);
        $this->load->view('layout/footer', $data);
    }
}