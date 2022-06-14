<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }

    function index()
    {
        check_already_login();
        if ($this->session->userdata('username')) {
            redirect('Dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            // $this->load->view("layout/auth_header.php");
            $this->load->view("auth/login");
            // $this->load->view("layout/auth_footer.php");
        } else {
            $this->cek_login();
        }
    }

    function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_bidang' => $user['id_bidang'],
                    'status' => $user['status'],
                    'id_user' => $user['id_user'],
                ];
                if ($user['status'] == "Active") {
                    $this->session->set_userdata($data);
                    if ($user['role'] == 'Admin') {
                        redirect('Dashboard');
                    } else if($user['role'] == 'User'){
                        redirect('Dashboard');
                    } else{
                        redirect('Auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Aktif!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Belum Terdaftar!</div>');
            redirect('auth');
        }
    }

    public function cekakses(){
        
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('auth');
    }
}
