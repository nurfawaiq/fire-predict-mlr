<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('dataset');
        if($id != null) {
            $this->db->where('id_dataset', $id);
        }
        $this->db->order_by('alert_year', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function create($post)
    {
        unset($post['create']);
        $post['iso'] = "IDN";
        $this->db->insert('dataset', $post);
    }
    
    public function update($post)
    {
        $params = [
            'alert_year' => $post['alert_year'],
            'alert_week' => $post['alert_week'],
            'burn_area' => $post['burn_area'],
        ];
        $this->db->where('id_dataset', $post['id_dataset']);
        $this->db->update('dataset', $params);
    }

    public function delete($id)
	{
        $this->db->where('id_dataset', $id);
        $this->db->delete('dataset');
    }

    // Total
    public function get_total()
    {
        $query = $this->db->query("SELECT DISTINCT alert_year, 
            COUNT(alert_week) as alert_count, 
            SUM(alert_week) as alert_sum, 
            SUM(burn_area) as burn_sum 
                FROM dataset 
                GROUP BY alert_year");
        return $query;
    }


}