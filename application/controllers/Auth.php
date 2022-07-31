<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
	}

	public function index()
	{
		redirect('auth/login');
	}

    public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

    public function process()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->user_m->login($post);
		if($query->num_rows() > 0) {
			$row = $query->row();
			$params = array(
				'id_user' => $row->id_user,
			);
			$this->session->set_userdata($params);
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('error', 'Gagal! Username / password salah');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$params = array('id_user');
		$this->session->unset_userdata($params);
		session_destroy();
		redirect('dashboard');
	}
	
}
