<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Aset_model');
        $this->load->model('Bidang_model');
        $this->load->model('JenisAset_model');
        $this->load->model('Menu_model');
        $this->load->model('HakAkses_model');
    }

    function index()
    {
        $data['judul'] = "Data User";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->User_model->get();
        $data['bidang'] = $this->Bidang_model->get();
        $data['menu'] = $this->Menu_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('akun/akun', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Akun";
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
            $i = [2, 3, 5, 6, 8, 9];
            $maxuid = $this->User_model->getMaxUID();
            foreach ($i as $j){
                if ($j == 3){
                    $data2 = [
                    'id_user' => $maxuid,
                    'id_menu' => $j,
                    'hapus' => 2,
                    ];
                }elseif ($j == 8){
                    $data2 = [
                    'id_user' => $maxuid,
                    'id_menu' => $j,
                    'hapus' => 2,
                    ];
                }elseif ($j == 9){
                    $data2 = [
                    'id_user' => $maxuid,
                    'id_menu' => $j,
                    'tambah' => 2,
                    'hapus' => 2,
                    ];
                }else{
                    $data2 = [
                    'id_user' => $maxuid,
                    'id_menu' => $j,
                    ];
                }
            $this->HakAkses_model->insert($data2);
            }
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

        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username Wajib di isi'
        ]);
        $this->form_validation->set_rules('role', 'role', 'required', [
            'required' => 'Nomor Aset Wajib di isi'
        ]);
        $this->form_validation->set_rules('bidang', 'bidang', 'required', [
            'required' => 'Nama Aset Wajib di isi'
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
            ];
            $id = $this->input->post('id_user');
            $this->User_model->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Diubah!</div>');
            redirect('Akun');
        }
    }

    public function update_hak_tambah($id_menu, $tambah, $id_user)
    {

        $this->load->model('HakAkses_model', 'userdata');

        //send id and status to the model to update the status
        if ($this->userdata->update_hak_model_tambah($id_menu, $tambah)) {
            $this->session->set_flashdata('response', 'Success');
            $this->session->set_flashdata('id', $id_user);
        } else {
            $this->session->set_flashdata('response', 'Error');
        }
        return redirect('Akun');
    }

    public function update_hak_edit($id_menu, $edit, $id_user)
    {

        $this->load->model('HakAkses_model', 'userdata');

        //send id and status to the model to update the status
        if ($this->userdata->update_hak_model_edit($id_menu, $edit)) {
            $this->session->set_flashdata('response', 'Success');
            $this->session->set_flashdata('id', $id_user);
        } else {
            $this->session->set_flashdata('response', 'Error');
        }
        return redirect('Akun');
    }

    public function update_hak_hapus($id_menu, $hapus, $id_user)
    {

        $this->load->model('HakAkses_model', 'userdata');

        //send id and status to the model to update the status
        if ($this->userdata->update_hak_model_hapus($id_menu, $hapus)) {
            $this->session->set_flashdata('response', 'Success');
            $this->session->set_flashdata('id', $id_user);
        } else {
            $this->session->set_flashdata('response', 'Error');
        }
        return redirect('Akun');
    }

    public function update_status($id, $status)
    {
        $this->load->model('User_model', 'userdata');

        //send id and status to the model to update the status
        if ($this->userdata->update_status_model($id, $status)) {
            $this->session->set_flashdata('msg', 'User status has been updated successfully!');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'User status has not been updated successfully!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        return redirect('Akun');
    }
}
