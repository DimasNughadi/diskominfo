<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencana extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Rencana_model');
        $this->load->model('Aset_model');
        $this->load->model('Resiko_model');
        $this->load->model('Bidang_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Rencana Penanganan";

        $data['rencana'] = $this->Rencana_model->showRencana()->result();
        $data['aset'] = $this->Aset_model->get();
        $data['resiko'] = $this->Resiko_model->get();
        $data['userdata'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('rencana/vw_rencana', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah($id)
    {
        $data['judul'] = "Tambah Rencana Penanganan";
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
        $this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric', [
            'required' => 'Anggaran Wajib di isi',
            'numeric' => 'Anggaran Wajib Angka'
        ]);
        $this->form_validation->set_rules('pic', 'PIC', 'required', [
            'required' => 'PIC Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("rencana/vw_tambah_rencana", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_risiko' => $this->input->post('id_risiko'),
                'deskripsi' => $this->input->post('deskripsi'),
                'plan_mulai' => $this->input->post('plan_mulai'),
                'plan_selesai' => $this->input->post('plan_selesai'),
                'indikator_output' => $this->input->post('indikator_output'),
                'anggaran' => $this->input->post('anggaran'),
                'pic' => $this->input->post('pic'),
                'status' => $this->input->post('status'),
            ];
            $this->Rencana_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                                                Rencana Penanganan Berhasil Ditambah!</div>');
            redirect('rencana');
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

        $this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric', [
            'required' => 'Anggaran Wajib di isi',
            'numeric' => 'Anggaran Wajib Angka'
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
                'anggaran' => $this->input->post('anggaran'),
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
