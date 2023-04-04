<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subdomain_model extends CI_Model
{

    public function get_subdomain()
    {
        $this->db->select('subdomain.*');
        $this->db->from('subdomain');
        $this->db->order_by('id', 'asc');
        $this->db->limit(9);
        return $this->db->get()->result_array();
    }
    public function simpan_subdomain($data)
    {
        $this->db->insert('subdomain', $data);
    }

    public function edit_subdomain($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('subdomain', $data);
    }

    public function hapus_subdomain($id)
    {
        return $this->db->delete('subdomain', array('id' => $id));
    }
}
