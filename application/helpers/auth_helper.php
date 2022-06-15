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
        $CI->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Anda Tidak Dapat Mengakses Halaman tersebut!</div>');
        redirect('dashboard', 'refresh');
    }
}

function check_menu_tambah_access($id_user, $id_menu, $tambah)
{
    $CI = &get_instance();
    $CI->db->where('id_user', $id_user);
    $CI->db->where('id_menu', $id_menu);
    $result = $CI->db->get('hak_akses');

    if($result->num_rows() > 0){
        if($tambah == 1){
            return"checked='checked'";
        }elseif($tambah == 0){
            return"";
        }
    }
}

function check_menu_edit_access($id_user, $id_menu, $edit)
{
    $CI = &get_instance();
    $CI->db->where('id_user', $id_user);
    $CI->db->where('id_menu', $id_menu);
    $result = $CI->db->get('hak_akses');

    if($result->num_rows() > 0){
        if($edit == 1){
            return"checked='checked'";
        }elseif($edit == 0){
            return"";
        }
    }
}

function check_menu_hapus_access($id_user, $id_menu, $hapus)
{
    $CI = &get_instance();
    $CI->db->where('id_user', $id_user);
    $CI->db->where('id_menu', $id_menu);
    $result = $CI->db->get('hak_akses');

    if($result->num_rows() > 0){
        if($hapus == 1){
            return"checked='checked'";
        }elseif($hapus == 0){
            return"";
        }
    }
}