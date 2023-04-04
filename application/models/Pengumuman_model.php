<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function get_pengumuman($slug = false)
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->order_by('id', 'desc');


        if ($slug == false) {
            $this->db->limit(9);
            return $this->db->get()->result_array();
        } else {
            $this->db->where('slug', $slug);
            return $this->db->get()->row_array();
        }
    }
    public function simpan_pengumuman($data)
    {
        $this->db->insert('pengumuman', $data);
    }

    public function edit_pengumuman($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('pengumuman', $data);
    }

    public function hapus_pengumuman($id)
    {
        return $this->db->delete('pengumuman', array('id' => $id));
    }
}
