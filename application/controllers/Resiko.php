<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resiko extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
        $this->load->model('Resiko_model');
        $this->load->model('HakAkses_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Identifikasi Risiko";
        // if($this->session->userdata('role') == "Aptika")
        // {
        //     $data['resiko'] = $this->Resiko_model->showRisikoSoftware()->result();
        // }elseif($this->session->userdata('role') == "Infrastruktur")
        // {
        //     $data['resiko'] = $this->Resiko_model->showRisikoPhysical()->result();
        // }else{
        //     $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        // }
        $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['userdata'] = $this->User_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('resiko/resiko', $data);
        $this->load->view('layout/footer', $data);
    }

    public function daftar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Daftar Risiko";
        // if($this->session->userdata('role') == "Aptika")
        // {
        //     $data['resiko'] = $this->Resiko_model->showRisikoSoftware()->result();
        // }elseif($this->session->userdata('role') == "Infrastruktur")
        // {
        //     $data['resiko'] = $this->Resiko_model->showRisikoPhysical()->result();
        // }else{
        //     $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        // }
        $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['userdata'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('resiko/daftar_risiko', $data);
        $this->load->view('layout/footer', $data);
    }

    // public function tambah()
    // {
    //     $data['judul'] = "Tambah Risiko";
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
    //     $data['aset'] = $this->Aset_model->get();
    //     $this->form_validation->set_rules('nama_risiko', 'Nama Risiko', 'required', [
    //         'required' => 'Nama Risiko Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('penyebab', 'Penyebab', 'required', [
    //         'required' => 'Penyebab Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('dampak', 'Dampak', 'required', [
    //         'required' => 'Dampak Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
    //         'required' => 'Tahun Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('pengendalian', 'Pengendalian', 'required', [
    //         'required' => 'Pengendalian Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('keputusan', 'Keputusan', 'required', [
    //         'required' => 'Keputusan Wajib di isi'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout/header", $data);
    //         $this->load->view("resiko/vw_tambah_resiko", $data);
    //         $this->load->view("layout/footer", $data);
    //     } else {
    //         $skala_dampak = $this->input->post('skala_dampak');
    //         $skala_kemungkinan = $this->input->post('skala_kemungkinan');
    //         $data = [
    //             'nama_risiko' => $this->input->post('nama_risiko'),
    //             'penyebab' => $this->input->post('penyebab'),
    //             'dampak' => $this->input->post('dampak'),
    //             'tahun' => $this->input->post('tahun'),
    //             'pengendalian' => $this->input->post('pengendalian'),
    //             'keputusan' => $this->input->post('keputusan'),
    //             'id_aset' => $this->input->post('id_aset'),
    //             'skala_dampak' => $this->input->post('skala_dampak'),
    //             'skala_kemungkinan' => $this->input->post('skala_kemungkinan'),
    //             'tingkat_risiko' => $skala_dampak * $skala_kemungkinan,
    //             'id_user' => $this->input->post('id_user')
    //         ];
    //         $this->Resiko_model->insert($data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
    //                                             Variabel Risiko Berhasil Ditambah!</div>');
    //         redirect('resiko');
    //     }
    // }

    public function tambah($id)
    {
        $data['id'] = $id;
        $data['judul'] = "Tambah Risiko";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aset'] = $this->Aset_model->get();
        $this->form_validation->set_rules('nama_risiko', 'Nama Risiko', 'required', [
            'required' => 'Nama Risiko Wajib di isi'
        ]);
        $this->form_validation->set_rules('penyebab', 'Penyebab', 'required', [
            'required' => 'Penyebab Wajib di isi'
        ]);
        $this->form_validation->set_rules('dampak', 'Dampak', 'required', [
            'required' => 'Dampak Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => 'Tahun Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengendalian', 'Pengendalian', 'required', [
            'required' => 'Pengendalian Wajib di isi'
        ]);
        $this->form_validation->set_rules('keputusan', 'Keputusan', 'required', [
            'required' => 'Keputusan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("resiko/vw_tambah_resiko", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $skala_dampak = $this->input->post('skala_dampak');
            $skala_kemungkinan = $this->input->post('skala_kemungkinan');
            $data = [
                'nama_risiko' => $this->input->post('nama_risiko'),
                'penyebab' => $this->input->post('penyebab'),
                'dampak' => $this->input->post('dampak'),
                'tahun' => $this->input->post('tahun'),
                'pengendalian' => $this->input->post('pengendalian'),
                'keputusan' => $this->input->post('keputusan'),
                'id_aset' => $this->input->post('id_aset'),
                'skala_dampak' => $this->input->post('skala_dampak'),
                'skala_kemungkinan' => $this->input->post('skala_kemungkinan'),
                'tingkat_risiko' => $skala_dampak * $skala_kemungkinan,
                'id_user' => $this->input->post('id_user')
            ];
            $this->Resiko_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                                                Variabel Risiko Berhasil Ditambah!</div>');
            redirect('resiko');
        }
    }

    
    public function hapus($id)
    {
        $this->Resiko_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon  fas fa-info-circle"></i>Data Risiko tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i  class="icon fas fa-check-circle"></i>Data Risiko Berhasil Dihapus!</div>');
        }
        redirect('Resiko');
    }

    function edit($id)
    {
        $data['judul'] = "Ubah Data Risiko";
        // if($this->session->userdata('role') == "Aptika")
        // {
        //     $data['aset'] = $this->Aset_model->getAsetSoftware();
        // }elseif($this->session->userdata('role') == "Infrastruktur")
        // {
        //     $data['aset'] = $this->Aset_model->getAsetPhysical();

        // }else{
        //     $data['aset'] = $this->Aset_model->get();
        // }
        $data['aset'] = $this->Aset_model->get();
        $data['resiko'] = $this->Resiko_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_risiko', 'Nama Risiko', 'required', [
            'required' => 'Nama Risiko Wajib di isi'
        ]);
        $this->form_validation->set_rules('penyebab', 'Penyebab', 'required', [
            'required' => 'Penyebab Wajib di isi'
        ]);
        $this->form_validation->set_rules('dampak', 'Dampak', 'required', [
            'required' => 'Dampak Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => 'Tahun Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengendalian', 'Pengendalian', 'required', [
            'required' => 'Pengendalian Wajib di isi'
        ]);
        $this->form_validation->set_rules('keputusan', 'Keputusan', 'required', [
            'required' => 'Keputusan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("resiko/vw_edit_resiko", $data);
            $this->load->view("layout/footer", $data);
        } else {

            $skala_dampak = $this->input->post('skala_dampak');
            $skala_kemungkinan = $this->input->post('skala_kemungkinan');
            $data = [
                'nama_risiko' => $this->input->post('nama_risiko'),
                'penyebab' => $this->input->post('penyebab'),
                'dampak' => $this->input->post('dampak'),
                'tahun' => $this->input->post('tahun'),
                'pengendalian' => $this->input->post('pengendalian'),
                'keputusan' => $this->input->post('keputusan'),
                'id_aset' => $this->input->post('id_aset'),
                'skala_dampak' => $this->input->post('skala_dampak'),
                'skala_kemungkinan' => $this->input->post('skala_kemungkinan'),
                'tingkat_risiko' => $skala_dampak * $skala_kemungkinan,
                'id_user' => $this->input->post('id_user'),

                'id_risiko' => $this->input->post('id_risiko'),
            ];

            $id = $this->input->post('id_risiko');
            $this->Resiko_model->update(['id_risiko' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Resiko Berhasil Diubah!</div>');
            redirect('Resiko');
        }
    }
}
