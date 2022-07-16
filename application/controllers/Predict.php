<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Predict extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('dataset_m');
	}

	public function index()
	{
        $data['row'] = $this->dataset_m->get_total();
		$this->template->load('template', 'predict/index', $data);
	}
    
}
