<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat_model extends CI_Model
{

    public function get_pejabat($id = false)
    {
        $this->db->select('pejabat.*,opd.nama_opd,jabatan.jabatan');
        $this->db->from('pejabat');
        $this->db->join('opd', 'opd.id_opd = pejabat.id_opd', 'left');
        $this->db->join('jabatan', 'jabatan.id_jabatan = pejabat.id_jabatan', 'left');
        if ($id == false) {

            $this->db->order_by('pejabat.id_jabatan', 'asc');
            return $this->db->get()->result_array();
        } else {
            $this->db->where("pejabat.id_pejabat", $id);
            return $this->db->get()->row_array();
        }
        return $this->db->get()->result_array();
    }

    public function simpan_pejabat($data)
    {
        $this->db->insert('pejabat', $data);
    }

    public function edit_pejabat($data, $id)
    {
        $this->db->where('id_pejabat', $id);
        $this->db->update('pejabat', $data);
    }

    public function hapus_pejabat($id)
    {
        return $this->db->delete('pejabat', array('id_pejabat' => $id));
    }

    public function get_allpejabat($limit, $start)
    {
        $this->db->select('pejabat.*,opd.nama_opd,jabatan.jabatan');
        $this->db->from('pejabat');
        $this->db->join('opd', 'opd.id_opd = pejabat.id_opd', 'left');
        $this->db->join('jabatan', 'jabatan.id_jabatan = pejabat.id_jabatan', 'left');
        $this->db->limit($limit);
        $this->db->offset($start);
        $this->db->order_by('pejabat.id_jabatan', 'asc');
        return $this->db->get()->result_array();
    }

    public function get_jabatan()
    {
        $this->db->select('jabatan.*');
        $this->db->from('jabatan');
        $this->db->order_by('id_jabatan', 'asc');
        return $this->db->get()->result_array();
    }
}
