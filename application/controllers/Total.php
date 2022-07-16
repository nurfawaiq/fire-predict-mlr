<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Total extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('dataset_m');
	}

	public function index()
	{
        $data['row'] = $this->dataset_m->get_total();
		$this->template->load('template', 'total/index', $data);
	}

    public function delete()
    {
        check_login();
        $post = $this->input->post(null, TRUE);
        if (!empty($post['alert_year'])) {
            $this->db->where('alert_year', $post['alert_year']);
            $this->db->delete('dataset');
            $this->session->set_flashdata('success', 'Data '.$post['alert_year'].' berhasil dihapus');
        }
		redirect('total');
    }

}
