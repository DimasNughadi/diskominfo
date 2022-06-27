<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisAset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('JenisAset_model');
        $this->load->model('HakAkses_model');
    }

    public function index()
    {
        $data['judul'] = "Data Jenis Aset";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenisaset'] = $this->JenisAset_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('aset/vw_jenis_aset', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Jenis Aset";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_jenis_aset', 'nama_jenis_aset', 'required', [
            'required' => 'Nama Jenis Aset Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aset/vw_tambah_jenis_aset", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama_jenis_aset' => $this->input->post('nama_jenis_aset')
            ];
            $this->JenisAset_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jenis Aset Berhasil Ditambah!</div>');
            redirect('jenisaset');
        }
    }
    // public function hapus($id)
    // {
    //     $this->JenisAset_model->delete($id);
    //     $error = $this->db->error();
    //     if ($error['code'] != 0) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Jenis Aset tidak dapat dihapus (sudah berelasi)!</div>');
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Jenis Aset Berhasil Dihapus!</div>');
    //     }
    //     redirect('jenisaset');
    // }

    function edit($id)
    {
        $data['judul'] = "Edit Data Jenis Aset";
        $data['jenisaset'] = $this->JenisAset_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_jenis_aset', 'nama_jenis_aset', 'required', [
            'required' => 'Nama Jenis Aset Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aset/vw_edit_jenis_aset", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_jenis_aset' => $this->input->post('id_jenis_aset'),
                'nama_jenis_aset' => $this->input->post('nama_jenis_aset')
            ];
            $id = $this->input->post('id_jenis_aset');
            $this->JenisAset_model->update(['id_jenis_aset' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jenis Aset Berhasil Diubah!</div>');
            redirect('jenisaset');
        }
    }
}
