<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    function login($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_role($role)
    {
        $this->db->from('user');
        $this->db->where('role', $role);
        $query = $this->db->get();
        return $query;
    }

    public function create($post)
    {
        unset($post['create']);
        $post['password'] = sha1($post['password']);
        $this->db->insert('user', $post);
    }
    
    public function update($post)
    {
        $params['name'] = $post['name'];
        $params['phone'] = $post['phone'];
        $params['info'] = $post['info'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }

    public function delete($id)
	{
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

}