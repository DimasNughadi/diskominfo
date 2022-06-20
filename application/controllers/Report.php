<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Realisasi_model');
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
            $this->load->view('laporan/v_daftarResikoExcel', $data);
        } elseif (null !== $this->input->post('DRpdf')) {
            $this->load->library('pdf');
            $html = $this->load->view('laporan/vw_daftarRisikoPDF', $data, true);
            $this->pdf->createPDF($html, 'mypdf', 'landscape');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->render();

            // 8
        }
    }

    function getDR()
    {
        $tahun = $this->input->post('tahun');

        $where = $tahun;

        if ($tahun == '') {
            $dr = $this->Resiko_model->showRisiko()->result();
        } elseif($tahun != '') {
            $dr = $this->Laporan_model->showDR($where)->result();
        }

        if (count($dr) > 0) {


            foreach ($dr as $key) {

                $tbDr[] = $key;
            }

            echo json_encode($tbDr);
        }
    }
}
