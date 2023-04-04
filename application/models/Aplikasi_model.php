<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aplikasi_model extends CI_Model
{

    public function get_aplikasi()
    {
        $this->db->select('aplikasi.*');
        $this->db->from('aplikasi');
        $this->db->order_by('id_aplikasi', 'asc');
        //$this->db->limit(16);
        return $this->db->get()->result_array();
    }
    public function simpan_aplikasi($data)
    {
        $this->db->insert('aplikasi', $data);
    }

    public function edit_aplikasi($data, $id)
    {
        $this->db->where('id_aplikasi', $id);
        $this->db->update('aplikasi', $data);
    }

    public function hapus_aplikasi($id)
    {
        return $this->db->delete('aplikasi', array('id_aplikasi' => $id));
    }
}
