<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('User_model');
        $this->load->model('Bidang_model');
        $this->load->model('Menu_model');
        $this->load->model('HakAkses_model');
    }

    public function index()
    {
        $data['judul'] = "Account";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bidang'] = $this->Bidang_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $data['menu'] = $this->Menu_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('account/vw_account', $data);
        $this->load->view('layout/footer', $data);
    }

    public function ubahpassword()
    {
        $data['judul'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['bidang'] = $this->Bidang_model->get();
        $data['hak'] = $this->HakAkses_model->get();
        $data['menu'] = $this->Menu_model->get();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('account/vw_account', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            $username = $this->input->post('username');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password lama salah!
          </div>');
                redirect('account');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password Baru tidak sama!
          </div>');
                    redirect('account');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->set('username', $username);
                    $this->db->where('id_user', $data['user']['id_user']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diubah!
                   </div>');
                   $user = $this->db->get_where('user', ['username' => $username])->row_array();
                   $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_bidang' => $user['id_bidang'],
                    'status' => $user['status'],
                    'id_user' => $user['id_user'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('account');
                }
            }
        }
    }
}
