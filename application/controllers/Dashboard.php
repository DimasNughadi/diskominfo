<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Dashboard";
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('layout/footer', $data);

    }
}
