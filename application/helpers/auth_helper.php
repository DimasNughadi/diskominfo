<?php

function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('username');
    if ($user_session) {
        redirect('dashboard', 'refresh');
    }
}

function check_not_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('username');
    if (!$user_session) {
        $CI->session->set_flashdata('error', 'Silahkan Login terlebih dahulu!');
        redirect('auth', 'refresh');
    }
}

// function check_role_sales()
// {
//     $CI = &get_instance();
//     $user_session = $CI->session->userdata('role');
//     if ($user_session != 'User') {
//         $CI->session->set_flashdata('error', 'Hak akses terbatas!');
//         redirect('dashboard', 'refresh');
//     }
// }

function check_role_admin()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('role');
    if ($user_session != 'Admin') {
        // $CI->session->set_flashdata('error', 'Hak akses terbatas!');
        $CI->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Anda Tidak Dapat Mengakses Halaman tersebut</div>');
        redirect('dashboard', 'refresh');
    }
}
