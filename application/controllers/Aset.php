<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aset'] = $this->Aset_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('aset/aset', $data);
        $this->load->view('layout/footer', $data);

    }
}
