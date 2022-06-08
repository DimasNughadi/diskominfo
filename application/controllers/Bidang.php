<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_model');
    }

    public function index()
    {
        $data['judul'] = "Data Bidang";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bidang'] = $this->Bidang_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('bidang/vw_bidang', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Bidang";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required', [
            'required' => 'Nama Bidang Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', [
            'required' => 'Lokasi Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("bidang/vw_tambah_bidang", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama_bidang' => $this->input->post('nama_bidang'),
                'lokasi' => $this->input->post('lokasi')
            ];
            $this->Bidang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                                                Bidang Berhasil Ditambah!</div>');
            redirect('Bidang');
        }
    }
    public function hapus($id)
    {
        $this->Bidang_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Bidang tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Bidang Berhasil Dihapus!</div>');
        }
        redirect('bidang');
    }

    function edit($id)
    {
        $data['judul'] = "Edit Data Bidang";
        $data['bidang'] = $this->Bidang_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required', [
            'required' => 'Nama Bidang Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', [
            'required' => 'Lokasi Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("bidang/vw_edit_bidang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id_bidang' => $this->input->post('id_bidang'),
                'nama_bidang' => $this->input->post('nama_bidang'),
                'lokasi' => $this->input->post('lokasi'),
            ];
            $id = $this->input->post('id_bidang');
            $this->Bidang_model->update(['id_bidang' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Bidang Berhasil Diubah!</div>');
            redirect('Bidang');
        }
    }
}
