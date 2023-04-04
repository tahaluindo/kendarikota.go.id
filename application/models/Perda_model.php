<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perda_model extends CI_Model
{

    public function get_perda()
    {
        $this->db->select('perda.*');
        $this->db->from('perda');
        $this->db->order_by('id_perda', 'asc');
        //$this->db->limit(9);
        return $this->db->get()->result_array();
    }
    public function simpan_file($data)
    {
        $this->db->insert('perda', $data);
    }

    public function edit_file($data, $id)
    {
        $this->db->where('id_perda', $id);
        $this->db->update('perda', $data);
    }

    public function hapus_perda($id)
    {
        return $this->db->delete('perda', array('id_perda' => $id));
    }
}
