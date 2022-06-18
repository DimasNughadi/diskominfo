<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
        $this->load->model('JenisAset_model');
        $this->load->model('Bidang_model');
    }

    public function index()
    {
        $data['judul'] = "Data Aset";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aset'] = $this->Aset_model->get();
        // $session = $this->session->userdata('id_bidang');
        // $where2 = array(
        //     'user.id_bidang' => $session
        // );
        // $data['aset'] = $this->Aset_model->getPhysical($where2)->result();
        $data['jenisaset'] = $this->JenisAset_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['userdata'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('aset/aset', $data);
        $this->load->view('layout/footer', $data);
    }


    public function tambah()
    {
        $data['judul'] = "Tambah Data Aset";
        $data['jenisaset'] = $this->JenisAset_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id_user', 'ID User', 'required', [
            'required' => 'ID User Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_aset', 'Nomor Aset', 'required', [
            'required' => 'Nomor Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required', [
            'required' => 'Nama Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('qty', 'Jumlah Aset', 'required', [
            'required' => 'Jumlah Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('merk_aset', 'Merk Aset', 'required', [
            'required' => 'Merk Aset Wajib di isi'
        ]);

        $this->form_validation->set_rules('owner_aset', 'Ownet Aset', 'required', [
            'required' => 'Ownet Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi_aset', 'Lokasi Aset', 'required', [
            'required' => 'Lokasi Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('subclass_aset', 'Subclass Aset', 'required', [
            'required' => 'Subclass Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('used_by', 'Pengguna Aset', 'required', [
            'required' => 'Pengguna Aset Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aset/vw_tambah_aset", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_jenis_aset' => $this->input->post('id_jenis_aset'),
                'id_bidang' => $this->input->post('id_bidang'),
                'no_aset' => $this->input->post('no_aset'),
                'nama_aset' => $this->input->post('nama_aset'),
                'merk_aset' => $this->input->post('merk_aset'),
                'qty' => $this->input->post('qty'),
                'owner_aset' => $this->input->post('owner_aset'),
                'lokasi_aset' => $this->input->post('lokasi_aset'),
                'subclass_aset' => $this->input->post('subclass_aset'),
                'used_by' => $this->input->post('used_by'),
                'created_on' => time()
            ];
            $this->Aset_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                                                Aset Berhasil Ditambah!</div>');
            redirect('Aset');
        }
    }
    public function hapus($id)
    {
        $this->Aset_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Aset tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Aset Berhasil Dihapus!</div>');
        }
        redirect('aset');
    }

    function edit($id)
    {
        $data['judul'] = "Ubah Data Aset";
        $data['aset'] = $this->Aset_model->getById($id);
        $data['jenisaset'] = $this->JenisAset_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('id_user', 'ID User', 'required', [
            'required' => 'ID User Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_aset', 'Nomor Aset', 'required', [
            'required' => 'Nomor Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required', [
            'required' => 'Nama Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('qty', 'Jumlah Aset', 'required', [
            'required' => 'Jumlah Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('merk_aset', 'Merk Aset', 'required', [
            'required' => 'Merk Aset Wajib di isi'
        ]);

        $this->form_validation->set_rules('owner_aset', 'Ownet Aset', 'required', [
            'required' => 'Ownet Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi_aset', 'Lokasi Aset', 'required', [
            'required' => 'Lokasi Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('subclass_aset', 'Subclass Aset', 'required', [
            'required' => 'Subclass Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('used_by', 'Pengguna Aset', 'required', [
            'required' => 'Pengguna Aset Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aset/vw_edit_aset", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_jenis_aset' => $this->input->post('id_jenis_aset'),
                'id_bidang' => $this->input->post('id_bidang'),
                'no_aset' => $this->input->post('no_aset'),
                'nama_aset' => $this->input->post('nama_aset'),
                'merk_aset' => $this->input->post('merk_aset'),
                'qty' => $this->input->post('qty'),
                'owner_aset' => $this->input->post('owner_aset'),
                'lokasi_aset' => $this->input->post('lokasi_aset'),
                'subclass_aset' => $this->input->post('subclass_aset'),
                'used_by' => $this->input->post('used_by'),
                'created_on' => time(),
                'id_aset' => $this->input->post('id_aset'),
            ];

            $id = $this->input->post('id_aset');
            $this->Aset_model->update(['id_aset' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Diubah!</div>');
            redirect('Aset');
        }
    }
}
