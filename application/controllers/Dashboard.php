<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Aset_model');
        $this->load->model('User_model');
        $this->load->model('Resiko_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Dashboard";
        $data['aset'] = $this->Aset_model->getCount();
        $data['usercount'] = $this->User_model->getCount();
        $data['sangatrendah'] = $this->Resiko_model->getCountSR();
        $data['rendah'] = $this->Resiko_model->getCountR();
        $data['sedang'] = $this->Resiko_model->getCountS();
        $data['tinggi'] = $this->Resiko_model->getCountT();
        $data['sangattinggi'] = $this->Resiko_model->getCountST();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('layout/footer', $data);

    }
}
