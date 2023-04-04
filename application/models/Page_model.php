<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{

    public function get_page($id = false)
    {
        $this->db->select('halaman.*');
        $this->db->from('halaman');
        //$this->db->order_by('id_halaman', 'asc');
        $this->db->where('aktif', '1');

        if ($id == false) {

            $this->db->order_by('id_halaman', 'asc');
            return $this->db->get()->result_array();
        } else {
            $this->db->where("id_halaman", $id);
            return $this->db->get()->row_array();
        }
        return $this->db->get()->result_array();
    }

    public function addpage($data)
    {
        $this->db->insert('halaman', $data);
    }

    public function edit_page($data, $id)
    {
        $this->db->where('id_halaman', $id);
        $this->db->update('halaman', $data);
    }

    public function delete_page($id)
    {
        return $this->db->delete('halaman', array('id_halaman' => $id));
    }

    public function detail_page($slug)
    {
        $this->db->select('*');
        $this->db->from('halaman');
        $this->db->where('aktif', '1');
        $this->db->where("slug", $slug);
        $this->db->order_by('id_halaman', 'asc');
        return $this->db->get()->row_array();
    }
}
