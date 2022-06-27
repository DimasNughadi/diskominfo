<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Realisasi_model');
        $this->load->model('Rencana_model');
        $this->load->model('Aset_model');
        $this->load->model('User_model');
        $this->load->model('Resiko_model');
        $this->load->model('Laporan_model');
    }

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Laporan Daftar Risiko";
        $data['select'] = $this->Laporan_model->selectTahunPK()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_daftar_risiko', $data);
        $this->load->view('layout/footer', $data);
    }

    function risiko()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Laporan Daftar Risiko";
        $data['select'] = $this->Laporan_model->selectTahunPK()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_daftar_risiko', $data);
        $this->load->view('layout/footer', $data);
    }

    function exportdaftarrisiko()
    {
        $tahun = $this->input->post('tahun');

        // $where = array(
        //     'risiko.tahun' => $tahun
        // );

        $where =  $tahun;


        if (empty($tahun)) {
            $data['resiko'] = $this->Resiko_model->showRisiko()->result();
        } else {
            $data['resiko'] = $this->Laporan_model->showDR($where)->result();
        }

        if (null !== $this->input->post('DRexcel')) {
            $this->load->view('laporan/vw_daftarRisikoExcel', $data);
        } elseif (null !== $this->input->post('DRpdf')) {
            $this->load->library('pdf');
            $html = $this->load->view('laporan/vw_daftarRisikoPDF', $data, true);
            $this->pdf->createPDF($html, 'Laporan_DaftarRisiko', 'landscape');
            $this->pdf->render();
        }
    }

    function getDR()
    {
        $tahun = $this->input->post('tahun');

        $where = $tahun;

        if ($tahun == '') {
            $dr = $this->Resiko_model->showRisiko()->result();
        } elseif ($tahun != '') {
            $dr = $this->Laporan_model->showDR($where)->result();
        }

        if (count($dr) > 0) {


            foreach ($dr as $key) {

                $tbDr[] = $key;
            }

            echo json_encode($tbDr);
        }
    }

    function rencana()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Laporan Rencana Penanganan Risiko";
        $data['select'] = $this->Laporan_model->selectTahunPK()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_rencana', $data);
        $this->load->view('layout/footer', $data);
    }

    function exportrencana()
    {
        $tahun = $this->input->post('tahun');


        $where =  $tahun;


        if (empty($tahun)) {
            $data['rencana'] = $this->Rencana_model->showRencana()->result();
        } else {
            $data['rencana'] = $this->Laporan_model->showRencana($where)->result();
        }

        if (null !== $this->input->post('Rencanaexcel')) {
            $this->load->view('laporan/vw_rencanaExcel', $data);
        } elseif (null !== $this->input->post('Rencanapdf')) {
            $this->load->library('pdf');
            $html = $this->load->view('laporan/vw_rencanaPDF', $data, true);
            $this->pdf->createPDF($html, 'Laporan_RencanaPenanganan', 'landscape');
            $this->pdf->render();
        }
    }

    function getRencana()
    {
        $tahun = $this->input->post('tahun');

        $where = $tahun;

        if ($tahun == '') {
            $rcn = $this->Rencana_model->showRencanaReport()->result();
        } elseif ($tahun != '') {
            $rcn = $this->Laporan_model->showRencana($where)->result();
        }

        if (count($rcn) > 0) {


            foreach ($rcn as $key) {

                $tbRencana[] = $key;
            }

            echo json_encode($tbRencana);
        }
    }

    function realisasi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = "Laporan Realisasi Penanganan Risiko";
        $data['select'] = $this->Laporan_model->selectTahunPK()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('laporan/vw_laporan_realisasi', $data);
        $this->load->view('layout/footer', $data);
    }

    function exportrealisasi()
    {
        $tahun = $this->input->post('tahun');


        $where =  $tahun;


        if (empty($tahun)) {
            $data['realisasi'] = $this->Realisasi_model->showRealisasi()->result();
        } else {
            $data['realisasi'] = $this->Laporan_model->showRealisasi($where)->result();
        }

        if (null !== $this->input->post('Realisasiexcel')) {
            $this->load->view('laporan/vw_realisasiExcel', $data);
        } elseif (null !== $this->input->post('Realisasipdf')) {
            $this->load->library('pdf');
            $html = $this->load->view('laporan/vw_realisasiPDF', $data, true);
            $this->pdf->createPDF($html, 'Laporan_RealisasiPenanganan', 'landscape');
            $this->pdf->render();
        }
    }

    function getRealisasi()
    {
        $tahun = $this->input->post('tahun');

        $where = $tahun;

        if ($tahun == '') {
            $real = $this->Realisasi_model->showRealisasiReport()->result();
        } elseif ($tahun != '') {
            $real = $this->Laporan_model->showRealisasi($where)->result();
        }

        if (count($real) > 0) {


            foreach ($real as $key) {

                $tbRealisasi[] = $key;
            }

            echo json_encode($tbRealisasi);
        }
    }
}
