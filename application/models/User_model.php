<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getSession()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function editUser($name, $email)
    {

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function changePassword($password_hash, $email)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
