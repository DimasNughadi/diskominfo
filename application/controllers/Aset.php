<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
    }

    public function index()
    {
        $data['judul'] = "Data Aset";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aset'] = $this->Aset_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('aset/aset', $data);
        $this->load->view('layout/footer', $data);

    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Aset";
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
        $data['judul'] = "Edit Data Paket";
        $data['paket'] = $this->Paket_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenis', 'Jenis Paket', 'required', [
            'required' => 'Jenis Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Paket', 'required', [
            'required' => 'Nama Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga Paket', 'required|numeric', [
            'required' => 'Harga Wajib di isi',
            'numeric' => 'Harga Wajib Angka'
        ]);
        $this->form_validation->set_rules('deskripsi1', 'Deskripsi Paket', 'required', [
            'required' => 'Deskripsi Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi2', 'Deskripsi Paket', 'required', [
            'required' => 'Deskripsi Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi3', 'Deskripsi Paket', 'required', [
            'required' => 'Deskripsi Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi4', 'Deskripsi Paket', 'required', [
            'required' => 'Deskripsi Paket Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi5', 'Deskripsi Paket', 'required', [
            'required' => 'Deskripsi Paket Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("paket/vw_ubah_paket", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'jenis' => $this->input->post('jenis'),
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'deskripsi1' => $this->input->post('deskripsi1'),
                'deskripsi2' => $this->input->post('deskripsi2'),
                'deskripsi3' => $this->input->post('deskripsi3'),
                'deskripsi4' => $this->input->post('deskripsi4'),
                'deskripsi5' => $this->input->post('deskripsi5'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/images/paket/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $query = $this->db->set('gambar', $new_image);
                    if ($query) {
                        $old_image = $this->db->get_where('paket', ['id' => $id])->row();
                        unlink(FCPATH . 'assets/images/paket/' . $old_image->gambar);
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Paket_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Paket Berhasil Diubah!</div>');
            redirect('Paket');
        }
    }
}
