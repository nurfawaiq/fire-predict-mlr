<?php
function check_already_login() {
    $ci =& get_instance();
    $id_user = $ci->session->userdata('id_user');
    if($id_user) {
        redirect('dashboard');
    }
}
function check_login() {
    $ci =& get_instance();
    $id_user = $ci->session->userdata('id_user');
    if(!$id_user) {
        redirect('auth/login');
    }
}
function user($id = null) {
    $ci =& get_instance();
    $ci->load->model('user_m');
    if($id != null) {
        $id_user = $id;
    } else {
        $id_user = $ci->session->userdata('id_user');
    }
    $user = $ci->user_m->get($id_user)->row();
    return $user; 
}

function dashboard($table, $where = null) {
    $ci =& get_instance();
    $ci->db->from($table);
    if($where != null) {
        $ci->db->where($where);
    }
    $query = $ci->db->get()->num_rows();
    return $query;
}