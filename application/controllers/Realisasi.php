<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Realisasi_model');
        $this->load->model('Aset_model');
        $this->load->model('Resiko_model');
        $this->load->model('Bidang_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Realisasi Penanganan";

        $data['realisasi'] = $this->Realisasi_model->showRealisasi()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['resiko'] = $this->Resiko_model->get();
        $data['userdata'] = $this->User_model->get();
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
        $data['judul'] = "Edit Rencana Penanganan";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rencana'] = $this->Rencana_model->showRencanaById($id);
        $data['bidang'] = $this->Bidang_model->get();

        $this->form_validation->set_rules('deskripsi', 'Deskripsi RTP', 'required', [
            'required' => 'Deskripsi RTP Wajib di isi'
        ]);
        $this->form_validation->set_rules('plan_mulai', 'Plan Mulai', 'required', [
            'required' => 'Plan Mulai Wajib di isi'
        ]);
        $this->form_validation->set_rules('plan_selesai', 'Plan Selesai', 'required', [
            'required' => 'Plan Selesai Wajib di isi'
        ]);
        $this->form_validation->set_rules('indikator_output', 'Indikator Output', 'required', [
            'required' => 'Indikator Output Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("rencana/vw_edit_rencana", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'deskripsi' => $this->input->post('deskripsi'),
                'plan_mulai' => $this->input->post('plan_mulai'),
                'plan_selesai' => $this->input->post('plan_selesai'),
                'indikator_output' => $this->input->post('indikator_output'),
                'pic' => $this->input->post('pic'),
                'status' => $this->input->post('status'),
                'id_risiko' => $this->input->post('id_risiko'),
            ];

            $id = $this->input->post('id_risiko');
            $this->Rencana_model->update(['id_risiko' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rencana Penanganan Risiko Berhasil Diubah!</div>');
            redirect('rencana');
        }
    }
}
