<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download_model extends CI_Model
{

    public function get_file()
    {
        $this->db->select('download.*');
        $this->db->from('download');
        $this->db->order_by('id_file', 'asc');
        //$this->db->limit(9);
        return $this->db->get()->result_array();
    }
    public function simpan_file($data)
    {
        $this->db->insert('download', $data);
    }

    public function edit_file($data, $id)
    {
        $this->db->where('id_file', $id);
        $this->db->update('download', $data);
    }

    public function hapus_file($id)
    {
        return $this->db->delete('download', array('id_file' => $id));
    }
}
