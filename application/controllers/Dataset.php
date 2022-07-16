<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('dataset_m');
	}

	public function index()
	{
        $data['row'] = $this->dataset_m->get();
		$this->template->load('template', 'dataset/index', $data);
	}

    public function create()
	{
		check_login();
		$this->template->load('template', 'dataset/create');
	}

    public function edit($id)
	{
		check_login();
		$dataset = $this->dataset_m->get($id);
		$row = $dataset->row();
		if($dataset->num_rows() > 0) {
            $data['row'] = $row;
			$this->template->load('template', 'dataset/edit', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('dataset')."';</script>";
		}
	}

	public function process()
	{
		check_login();
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['create'])) {
			$this->dataset_m->create($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
			}
		} else if(isset($_POST['update'])) {
			$this->dataset_m->update($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
			}
		} else if(isset($_POST['import'])) {
			require './vendor/autoload.php';
			$file_tmp = $_FILES['file_csv']['tmp_name'];
			$file_name = $_FILES['file_csv']['name'];
			// $file = $this->request->getFile('file_csv');
			// $extension = $file->getClientExtension();
			$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			if($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				$spreadsheet = $reader->load($file_tmp);
				$contacts = $spreadsheet->getActiveSheet()->toArray();
				foreach ($contacts as $key => $value) {
					if($key == 0) {
						continue;
					}
					$data = [
						'iso' => $value[0],
						'alert_year' => $value[2],
						'alert_week' => $value[3],
						'burn_area' => $value[4],
					];
					$this->db->insert('dataset', $data);
				}
				$this->session->set_flashdata('success', 'Dataset berhasil diimport');
			} else {
				$this->session->set_flashdata('eror', 'Dataset gagal diimport');
			}
		}
        redirect('dataset');
	}

	public function import()
	{
		check_login();
		$this->template->load('template', 'dataset/import');
	}

	public function delete()
	{
		check_login();
        $post = $this->input->post(null, TRUE);
        if (!empty($post['id_dataset'])) {
            $this->dataset_m->delete($post['id_dataset']);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
        }
		redirect('dataset');
	}
	
	public function delAll()
	{
		check_login();
		$this->db->empty_table('dataset');
		$this->session->set_flashdata('success', 'Semua data berhasil dihapus');
		redirect('dataset');
	}

}
