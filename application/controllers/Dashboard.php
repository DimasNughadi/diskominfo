<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Realisasi_model');
        $this->load->model('Aset_model');
        $this->load->model('User_model');
        $this->load->model('Resiko_model');
        $this->load->model('Realisasi_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Dashboard";
        $data['open'] = $this->Realisasi_model->getOpen();
        $data['close'] = $this->Realisasi_model->getClose();
        $data['aset'] = $this->Aset_model->getCount();
        $data['asetPersandian'] = $this->Aset_model->getCountP();
        $data['asetStatistika'] = $this->Aset_model->getCountS();
        $data['asetInfrastruktur'] = $this->Aset_model->getCountI();
        $data['asetAptika'] = $this->Aset_model->getCountA();
        $data['usercount'] = $this->User_model->getCount();
        $data['sangatrendah'] = $this->Resiko_model->getCountSR();
        $data['rendah'] = $this->Resiko_model->getCountR();
        $data['sedang'] = $this->Resiko_model->getCountS();
        $data['tinggi'] = $this->Resiko_model->getCountT();
        $data['sangattinggi'] = $this->Resiko_model->getCountST();
        $data['realisasi'] = $this->Realisasi_model->showRealisasi()->result();
        $data['resiko'] = $this->Resiko_model->get();
        $data['userdata'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('layout/footer', $data);

    }
}
