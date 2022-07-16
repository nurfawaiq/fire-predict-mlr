<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('dataset_m');
		$data['total'] = $this->dataset_m->get_total()->num_rows();
		$this->template->load('template', 'etc/dashboard', $data);
	}

	public function about()
	{
		$this->template->load('template', 'etc/about');
	}
}
