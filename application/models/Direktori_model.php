<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktori_model extends CI_Model
{

    public function get_lokasi()
    {
        $this->db->select('lokasi.*');
        $this->db->from('lokasi');
        $this->db->order_by('id_direktori', 'desc');
        //$this->db->limit(4);
        return $this->db->get()->result_array();
    }

    public function get_lokasi_by_direktori($id)
    {
        $this->db->select('lokasi.*,direktori.nama,direktori.icon');
        $this->db->from('lokasi');
        $this->db->join('direktori', 'direktori.id = lokasi.id_direktori', 'left');
        $this->db->where("lokasi.id_direktori", $id);
        //$this->db->limit(4);
        return $this->db->get()->result_array();
    }

    public function get_lokasi_direktori()
    {
        $this->db->select('lokasi.*,direktori.nama,direktori.icon');
        $this->db->from('lokasi');
        $this->db->join('direktori', 'direktori.id = lokasi.id_direktori', 'left');

        //$this->db->limit(4);
        return $this->db->get()->result_array();
    }

    public function get_direktori($id = false)
    {
        if ($id == false) {
            return $this->db->get('direktori')->result_array();
        } else {
            $this->db->where("direktori.id", $id);
            return $this->db->get('direktori')->row_array();
        }
    }

    public function simpan_lokasi($data)
    {
        $this->db->insert('lokasi', $data);
    }

    public function edit_lokasi($data, $id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $data);
    }

    public function hapus_lokasi($id)
    {
        return $this->db->delete('lokasi', array('id_lokasi' => $id));
    }
}
