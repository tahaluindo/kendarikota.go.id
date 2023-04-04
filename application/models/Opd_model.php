<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd_model extends CI_Model
{

    public function get_opd()
    {
        $this->db->select('opd.*');
        $this->db->from('opd');
        $this->db->order_by('kategori', 'asc');
        //$this->db->limit(9);
        return $this->db->get()->result_array();
    }

    public function get_opd_bycategory($kategori)
    {
        $this->db->select('opd.*');
        $this->db->from('opd');
        $this->db->order_by('kategori', 'asc');
        $this->db->like('kategori', $kategori);
        return $this->db->get()->result_array();
    }
    public function simpan_opd($data)
    {
        $this->db->insert('opd', $data);
    }

    public function edit_opd($data, $id)
    {
        $this->db->where('id_opd', $id);
        $this->db->update('opd', $data);
    }

    public function hapus_opd($id)
    {
        return $this->db->delete('opd', array('id_opd' => $id));
    }
}
