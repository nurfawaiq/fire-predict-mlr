<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calc extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('dataset_m');
	}

	public function index()
	{
        $data['row'] = $this->dataset_m->get_total();
		$this->template->load('template', 'calc/index', $data);
	}
    
}
