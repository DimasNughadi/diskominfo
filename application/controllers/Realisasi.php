<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Realisasi_model');
        $this->load->model('Aset_model');
        $this->load->model('Resiko_model');
        $this->load->model('Bidang_model');
        $this->load->model('HakAkses_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Realisasi Penanganan";
        $data['realisasi'] = $this->Realisasi_model->showRealisasi()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['resiko'] = $this->Resiko_model->get();
        $data['userdata'] = $this->User_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('realisasi/vw_realisasi', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah($id)
    {
        $data['judul'] = "Tambah Realisasi Penanganan";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['realisasi'] = $this->Realisasi_model->showRealisasiById($id);
        $data['bidang'] = $this->Bidang_model->get();


        $this->form_validation->set_rules('hambatan', 'Hambatan', 'required', [
            'required' => 'Hambatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('real_mulai', 'Real Mulai', 'required', [
            'required' => 'Real Mulai Wajib di isi'
        ]);
        $this->form_validation->set_rules('real_selesai', 'Real Selesai', 'required', [
            'required' => 'Real Selesai Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'Keterangan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("realisasi/vw_tambah_realisasi", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'real_mulai' => $this->input->post('real_mulai'),
                'real_selesai' => $this->input->post('real_selesai'),
                'hambatan' => $this->input->post('hambatan'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => "Close",
                'id_risiko' => $this->input->post('id_risiko'),
            ];
            $id = $this->input->post('id_risiko');
            $this->Realisasi_model->update(['id_risiko' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Realisasi Penanganan Risiko Berhasil Ditambah!</div>');
            redirect('realisasi');
        }
    }

    function edit($id)
    {
        $data['judul'] = "Edit Realisasi Penanganan";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['realisasi'] = $this->Realisasi_model->showRealisasiById($id);
        $data['bidang'] = $this->Bidang_model->get();

        $this->form_validation->set_rules('hambatan', 'Hambatan', 'required', [
            'required' => 'Hambatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('real_mulai', 'Real Mulai', 'required', [
            'required' => 'Real Mulai Wajib di isi'
        ]);
        $this->form_validation->set_rules('real_selesai', 'Real Selesai', 'required', [
            'required' => 'Real Selesai Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'Keterangan Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("realisasi/vw_edit_realisasi", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'real_mulai' => $this->input->post('real_mulai'),
                'real_selesai' => $this->input->post('real_selesai'),
                'hambatan' => $this->input->post('hambatan'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => "Close",
                'id_risiko' => $this->input->post('id_risiko'),
            ];

            $id = $this->input->post('id_risiko');
            $this->Realisasi_model->update(['id_risiko' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Realisasi Penanganan Risiko Berhasil Diubah!</div>');
            redirect('realisasi');
        }
    }

    function upload($id)
    {
        $data['realisasi'] = $this->Realisasi_model->showRealisasiById($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->input->method() === 'post') {
            $nama_file = 'file_' . $this->session->userdata('username');
            $config['upload_path']   = './uploadzip/';
            $config['allowed_types'] = 'jpg|png|jpeg|zip|rar|pdf';
            $config['max_size']      = '3048';
            $config['remove_space']  = TRUE;
            $config['file_name'] = $nama_file;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('berkas')) {
                $return = array('result' => 'success', 'berkas' => $this->upload->data(), 'error' => '');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $id = $this->input->post('id_risiko');
        $this->Realisasi_model->saveupload($return);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File Berkas Berhasil Terupload!</div>');
        redirect('realisasi');
    }

    public function hapus($id)
    {
        $this->Realisasi_model->reset($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Realisiasi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Realisiasi Berhasil Direset!</div>');
        }
        redirect('realisasi');
    }
}
