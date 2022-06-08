<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
        $this->load->model('Bidang_model');
        $this->load->model('JenisAset_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['userdata'] = $this->User_model->getById($id);
        $data['akun'] = $this->User_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['judul'] = "Data Akun";
        $this->load->view('layout/header', $data);
        $this->load->view('akun/akun', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Akun";
        // $data['jenisaset'] = $this->JenisAset_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("akun/vw_tambah_akun", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'id_bidang' => $this->input->post('bidang'),
                'status' => $this->input->post('status')
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Baru Berhasil Ditambah!</div>');
            redirect('Akun');
        }
    }
    public function hapus($id)
    {
        $this->User_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Aset tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Aset Berhasil Dihapus!</div>');
        }
        redirect('Akun');
    }

    function edit($id)
    {
        $data['judul'] = "Ubah Data User";
        $data['userdata'] = $this->User_model->getById($id);
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
            $this->load->view("akun/vw_edit_akun", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'id_bidang' => $this->input->post('bidang'),
                'id_user' => $this->input->post('id_user'),
            ];
            $id = $this->input->post('id_user');
            $this->JenisAset_model->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jenis Aset Berhasil Diubah!</div>');
            redirect('Akun');
        }
    }
}
